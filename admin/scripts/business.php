<?php

include_once('global.php');

class Business {
	public function getSourceData($url) {
		$sourceData = null;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		$result = curl_exec($ch);
		$sourceData = json_decode($result);
		curl_close($ch);
		return $sourceData;
	}

	public function exportToConfigurationsFile($data) {
		$output_config = fopen("currencies-data.json", 'w');
		fwrite($output_config, json_encode($data));
		fclose($output_config);
	}

	public function exportToDestinatioFile($data) {
		$arr_destination_data = array();
		
		if(gettype($data) == "object")
			$data = get_object_vars($data);
		
		foreach ($data['currencies'] as $key => $currency) {
			if(gettype($currency) == "object")
				$currency = get_object_vars($currency);

			// Preparando o objeto com as informações que serão disponibilizadas...
			$obj_destination = new StdClass();
			$obj_destination->code 		= $currency['code_iso_alpha_3'];
			$obj_destination->name 		= $currency['name'];
			$obj_destination->timestamp = $currency['timestamp'];
			
			if(gettype($currency['finalValue']) == "object")
				$currency['finalValue'] = get_object_vars($currency['finalValue']);
			
			if($data['showBid'] === 'true')
				$obj_destination->bid = $currency['finalValue']['bid'];
			
			if($data['showAsk'] === 'true')
				$obj_destination->ask = $currency['finalValue']['ask'];

			$arr_destination_data[] = $obj_destination;
		}
		$output_destination = fopen('currencies-destination.json', 'w');
		fwrite($output_destination, json_encode($arr_destination_data));
		fclose($output_destination);
	}

	public function updateData($log) {
		// Iniciando o contador de tempo de execução
		list($usec, $sec) = explode(' ', microtime());
		$script_start = (float) $sec + (float) $usec;

		// Lendo o arquivo de configurações
		if($log)
			echo "Lendo o arquivo de configuracoes \n";
		$configurations = json_decode(file_get_contents("currencies-data.json"));

		// Percorrendo a lista de moedas cadastradas...
		if($log)
			echo "Percorrendo a lista de moedas cadastradas... \n";
		foreach ($configurations->currencies as $key => $currency) {
			// Obtém os dados da fonte de dados a partir da URL
			if($log)
				echo "Obtem os dados da fonte de dados a partir da URL \n";
			$sourceData = $this->getSourceData($currency->sourceLink);
			
			// Guardo uma cópia dos dados...
			if($log)
				echo "Guardo uma copia dos dados... \n";
			$currency->sourceData->high 		= (float)$sourceData[2]->high;
			$currency->sourceData->pctChange 	= (float)$sourceData[2]->pctChange;
			$currency->sourceData->open 		= (float)$sourceData[2]->open;
			$currency->sourceData->bid 			= (float)$sourceData[2]->bid;
			$currency->sourceData->ask 			= (float)$sourceData[2]->ask;
			$currency->sourceData->timestamp 	= (int)$sourceData[2]->timestamp;
			$currency->sourceData->name 		= (string)$sourceData[2]->name;
			$currency->sourceData->low 			= (float)$sourceData[2]->low;
			$currency->sourceData->notFresh 	= (bool)$sourceData[2]->notFresh;
			$currency->sourceData->varBid 		= (float)$sourceData[2]->varBid;

			// Se a atualização automáticao está habilitada
			if((bool)$currency->externalRefresh == true) {
				// Atualizo os valores de custo
				if($log)
					echo "Atualizo os valores de custo \n";
				$currency->cost->bid = $currency->sourceData->bid;
				$currency->cost->ask = $currency->sourceData->ask;

				// Atualizo os valores de corretagem
				if($log)
					echo "Atualizo os valores de corretagem \n";
				$currency->broking->bid->value = (($currency->cost->bid * ($currency->broking->bid->percent/100)) + $currency->cost->bid);
				$currency->broking->ask->value = (($currency->cost->ask * ($currency->broking->ask->percent/100)) + $currency->cost->ask);
				
				// Atualizo os valores comerciais
				if($log)
					echo "Atualizo os valores comerciais \n";
				$currency->comercial->bid = (($currency->broking->bid->value * ($configurations->iofTax/100)) + $currency->broking->bid->value);
				$currency->comercial->ask = (($currency->broking->ask->value * ($configurations->iofTax/100)) + $currency->broking->ask->value);
				
				// Atualizo os valores finais
				if($log)
					echo "Atualizo os valores finais \n";
				$currency->finalValue->bid = (($currency->comercial->bid * ($currency->markupPercent->bid/100)) + $currency->comercial->bid);
				$currency->finalValue->ask = (($currency->comercial->ask * ($currency->markupPercent->ask/100)) + $currency->comercial->ask);

				// Guardo a data de atualização
				$currency->timestamp = time();

				// Atualizo os dados do array novamente
				$configurations->currencies[$key] = $currency;
			}
		}

		$configurations->timestamp = time();

		// Atualizando o arquivo de configurações
		if($log)
			echo "Atualizando o arquivo de configuracoes \n";
		$this->exportToConfigurationsFile($configurations);

		// Gerando o arquivo com valores finais
		if($log)
			echo "Gerando o arquivo com valores finais \n";
		$this->exportToDestinatioFile($configurations);

		if($log)
			echo "Atualizacao realizada com sucesso!\n\n";

		// Terminamos o contador e exibimos uma mensagem
		list($usec, $sec) = explode(' ', microtime());
		$script_end = (float) $sec + (float) $usec;
		$elapsed_time = round($script_end - $script_start, 5);
		
		if($log) {
			echo 'Tempo de execucao: ', $elapsed_time, ' segundos';
			echo "\n";
			echo 'Memoria utilizada: ', round(((memory_get_peak_usage(true) / 1024) / 1024), 2), 'Mb';
			echo "\n\n";
		}
	}

	public function currencyExists($new_currency) {
		$configurations = json_decode(file_get_contents("currencies-data.json"));
		foreach ($configurations->currencies as $key => $currency) {
			if(strtolower($new_currency->code_iso_alpha_3) === strtolower($currency->code_iso_alpha_3))
				return true;
		}
		return false;
	}

	public function saveNewCurrency($new_currency) {
		$configurations = json_decode(file_get_contents("currencies-data.json"));
		$configurations->currencies[] = $new_currency;
		$this->exportToConfigurationsFile($configurations);
	}
}

?>