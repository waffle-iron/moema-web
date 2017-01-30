<?php

include_once('global.php');
include_once('business.php');

if(isset($_GET['action'])) {
	if($_GET['action'] == 'update-file') {
		try {
			$configurations = $_POST['configurations'];
			
			$configurations['iofTax'] 		= (float)$configurations['iofTax'];
			$configurations['showBid'] 		= ($configurations['showBid'] == 'true') ? true : false;
			$configurations['showAsk'] 		= ($configurations['showAsk'] == 'true') ? true : false;
			$configurations['timestamp'] 	= time();

			foreach ($configurations['currencies'] as $key => $currency) {
				$currency['externalRefresh'] 			= ($currency['externalRefresh'] == 'true') ? true : false;
				$currency['timestamp'] 					= time();
				$currency['cost']['bid'] 				= (float)$currency['cost']['bid'];
				$currency['cost']['ask'] 				= (float)$currency['cost']['ask'];
				$currency['broking']['bid']['percent'] 	= (float)$currency['broking']['bid']['percent'];
				$currency['broking']['bid']['value'] 	= (float)$currency['broking']['bid']['value'];
				$currency['broking']['ask']['percent'] 	= (float)$currency['broking']['ask']['percent'];
				$currency['broking']['ask']['value'] 	= (float)$currency['broking']['ask']['value'];
				$currency['comercial']['bid'] 			= (float)$currency['comercial']['bid'];
				$currency['comercial']['ask'] 			= (float)$currency['comercial']['ask'];
				$currency['markupPercent']['bid'] 		= (float)$currency['markupPercent']['bid'];
				$currency['markupPercent']['ask'] 		= (float)$currency['markupPercent']['ask'];
				$currency['finalValue']['bid'] 			= (float)$currency['finalValue']['bid'];
				$currency['finalValue']['ask'] 			= (float)$currency['finalValue']['ask'];
				$currency['sourceData']['high'] 		= (float)$currency['sourceData']['high'];
				$currency['sourceData']['pctChange'] 	= (float)$currency['sourceData']['pctChange'];
				$currency['sourceData']['open'] 		= (float)$currency['sourceData']['open'];
				$currency['sourceData']['bid'] 			= (float)$currency['sourceData']['bid'];
				$currency['sourceData']['ask'] 			= (float)$currency['sourceData']['ask'];
				$currency['sourceData']['timestamp'] 	= (int)$currency['sourceData']['timestamp'];
				$currency['sourceData']['name'] 		= (string)$currency['sourceData']['name'];
				$currency['sourceData']['low'] 			= (float)$currency['sourceData']['low'];
				$currency['sourceData']['notFresh'] 	= (bool)$currency['sourceData']['notFresh'];
				$currency['sourceData']['varBid'] 		= (float)$currency['sourceData']['varBid'];
				$configurations['currencies'][$key] = $currency;
			}

			$business = new Business();
			$business->exportToConfigurationsFile($configurations);
			$business->exportToDestinatioFile($configurations);

			http_response_code(200);
		} catch(ErrorException $e) {
			http_response_code(500);
			echo $e->getMessage();
		}
	}
	else if($_GET['action'] == 'update-data') {
		try {
			$business = new Business();
			$business->updateData(false);
			http_response_code(200);
		} catch(ErrorException $e) {
			http_response_code(500);
			echo $e->getMessage();
		}
	}
	else if($_GET['action'] == 'new-currency') {
		try {
			$business = new Business();

			$currency = (object)$_POST['currency'];
			
			if(!isset($currency->code_iso_alpha_3)
				|| !isset($currency->code_iso_alpha_3)
				|| !isset($currency->name)
				|| !isset($currency->icon)
				|| !isset($currency->sourceLink)
				|| !isset($currency->workerFormatter)
				|| !isset($currency->externalRefresh)
			) {
				http_response_code(406);
				echo "Todos os campos são obrigatórios.";
				die;
			}

			$currency->code_iso_alpha_3 = strtoupper($currency->code_iso_alpha_3);
			$currency->externalRefresh = ($currency->externalRefresh == 'true') ? true : false;
			
			$currency->cost = new StdClass();
			$currency->cost->bid = 0;
			$currency->cost->ask = 0;
			
			$currency->broking = new StdClass();
			$currency->broking->bid = new StdClass();
			$currency->broking->bid->percent = 0;
			$currency->broking->bid->value = 0;
			$currency->broking->ask = new StdClass();
			$currency->broking->ask->percent = 0;
			$currency->broking->ask->value = 0;

			$currency->comercial = new StdClass();
			$currency->comercial->bid = 0;
			$currency->comercial->ask = 0;

			$currency->markupPercent = new StdClass();
			$currency->markupPercent->bid = 0;
			$currency->markupPercent->ask = 0;

			$currency->finalValue = new StdClass();
			$currency->finalValue->bid = 0;
			$currency->finalValue->ask = 0;

			$currency->sourceData = new StdClass();
			
			if(!$business->currencyExists($currency)) {
				$business->saveNewCurrency($currency);
				http_response_code(201);
			}
			else {
				http_response_code(409);
				echo "A moeda que está tentando cadastrar já existe.";
			}
		} catch(ErrorException $e) {
			http_response_code(500);
			echo 'message: '. $e->getMessage() .' file: '. $e->getFile() .' line: '. $e->getLine();
		}
	}
}

?>