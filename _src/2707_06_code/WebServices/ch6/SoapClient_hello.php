<?php 
 //File: SoapClient_hello.php
 $client = new SoapClient("http://localhost:8081/active-bpel/services/helloService?wsdl"); 
 try {
  print($client->hello('father')); 
 }
 catch (SoapFault $e) {
  print $e->getMessage();
 }
?> 