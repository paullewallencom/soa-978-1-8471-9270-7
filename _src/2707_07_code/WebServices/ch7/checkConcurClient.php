<?php 
 //File: checkConcurClient.php
 $client = new SoapClient("http://localhost:8081/active-bpel/services/checkconcurService?wsdl"); 
 $sol = 'Hello,';
 try {
  print($client->getRslt($sol)); 
 }
 catch (SoapFault $e) {
  print $e->getMessage();
 }
?>
