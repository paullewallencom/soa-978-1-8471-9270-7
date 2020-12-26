<?php 
 //File: SoapClient_params.php
 $wsdl = "http://localhost/WebServices/wsdl/po_params.wsdl";
 $client = new SoapClient($wsdl);
 $pono='108128476';
 $par='status';
 try {
  print $result=$client->getOrder($pono, $par);
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
?>
