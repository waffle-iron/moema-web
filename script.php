<?php

class HttpUtil {

	public static function doGetRequest($url, $params, $headers=null) {
		if($params != "")
			 $url = $url . "?" . http_build_query($params);

		$curl = curl_init($url);

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		
		if($headers)
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		return curl_exec($curl);
	}

	public static function doPostRequest($url, $params, $useAuth=false, $user=null, $pass=null) {
		$curl = curl_init($url);

		if($useAuth)
			curl_setopt($curl, CURL_USERPWD, $user . ":" . $pass);

		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($params));
		
		$response = curl_exec($curl);

		return $response;
	}
}

if($_GET['t'] == 'flights') {
	$params['agency'] = 'ag81117';
	$params['query']  = $_GET['q'];
	$url = 'https://www.e-agencias.com.br/api/flights/autocomplete/cities_airports';
}
else if($_GET['t'] == 'packages') {
	$params['product'] 		= 'packages';
	$params['locale'] 		= 'pt-BR';
	$params['filtered'] 	= 'true';
	$params['agencyDomain'] = 'ag81117';
	$params['type'] 		= 'origin';
	$params['query'] 		= $_GET['q'];

	$url = 'https://www.e-agencias.com.br/api/cp/autocomplete';
}
else if($_GET['t'] == 'hotels') {
	$params['filtered'] 	= 'true';
	$params['query'] 		= $_GET['q'];

	$headers[] = 'agency-domain: ag81117';

	$url = 'https://www.e-agencias.com.br/api/hotels/autocomplete';
}

$result = HttpUtil::doGetRequest($url, $params, $headers);

header('Content-Type: application/json');
echo $result;

?>
