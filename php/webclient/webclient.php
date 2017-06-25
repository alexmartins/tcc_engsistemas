<?php
ini_set('display_errors', 'on');
require '../lib/startzend.php';

$cep = $_POST['cep'];
$protocolo = $_POST['protocolo'];

if ($protocolo == 'soap')
{
  $client = new Zend_Soap_Client('http://localhost/webserver/index.php?wsdl');
  $clima = $client->previsao($cep);
}

if ($protocolo == 'rest')
{
	$service_url = 'http://localhost/webserver/index.php?rest';
	$curl = curl_init($service_url);
	$curl_post_data = array(
	        'method' => 'previsao',
	        'cep' => $cep,
	);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
	$curl_response = curl_exec($curl);
	$clima = json_decode($curl_response);
}	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Clima pelo CEP</title>
</head>
<body>
O clima no CEP <?=$cep?> será <?=$clima?>.
<a href="index.php">Retornar</a>
</body>
</html>