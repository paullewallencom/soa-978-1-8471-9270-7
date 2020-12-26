<?php
//File: SoapServer_ext.php
require_once "purchaseOrder.php"; 
class MySoapServer extends SoapServer {
 var $client;
 function __construct($wsdl1, $wsdl2) {
  parent::__construct($wsdl1);
  $this->client = new SoapClient($wsdl2);
 }
 function handle() {
  ob_start();
  parent::handle();
  $buf=ob_get_contents();
  ob_get_flush();
  $buf=html_entity_decode($buf);
  $env = simplexml_load_string($buf);     
  $rslt= $env->xpath('//rsltMsg');
  if ($rslt==null) {
    $rslt= $env->xpath('//faultstring');
  }
  $this->client->regOrder(htmlentities((string) $rslt[0]));
 }
}
$wsdl1= "http://localhost/WebServices/wsdl/po_ext.wsdl";
$wsdl2= "http://localhost/WebServices/wsdl/reg.wsdl";
$srv= new MySoapServer($wsdl1, $wsdl2);
$srv->setClass("purchaseOrder");
$srv->handle();
?>
