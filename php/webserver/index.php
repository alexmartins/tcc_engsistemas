<?php
require '../lib/startzend.php';
require 'Clima.php';

$isXmlRpc = isset($_GET['xmlrpc']);
$isRest   = isset($_GET['rest']);
$isWsdl   = isset($_GET['wsdl']);
$cep   	  = isset($_GET['cep']);

if ($isXmlRpc)
  $server = new Zend_XmlRpc_Server();

if ($isWsdl)
  $server = new Zend_Soap_AutoDiscover();

if (!($isXmlRpc || $isRest || $isWsdl))
  $server = new Zend_Soap_Server('http://localhost/webserver/index.php?wsdl');

if(!$isRest){
    $server->setClass('Clima');
    echo $server->handle();
}else{
    header('Content-Type: application/json');
    $clima = new Clima();
    echo json_encode($clima->previsao($cep));
}