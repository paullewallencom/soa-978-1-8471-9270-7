<?php 
 //File: SoapClient.php
 $client = new SoapClient("http://localhost:8081/active-bpel/services/poInfoService?wsdl"); 
 $xmldoc = '<wrapper><pono>108128476</pono><par>doc</par></wrapper>';
 $xmldoc = simplexml_load_string($xmldoc);
 try {
  print($client->getInfo($xmldoc)); 
 }
 catch (SoapFault $e) {
  print $e->getMessage();
 }
?> 
