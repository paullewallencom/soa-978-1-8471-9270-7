<?php 
 //File: SoapClient_asyncSample.php
 $wsdl = "http://localhost:8081/active-bpel/services/AsyncCallerService?wsdl";
 $client = new SoapClient($wsdl);
 try {
  print $result=$client->echo('Hello!');
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
?>
