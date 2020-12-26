<?php 
 //File: SoapClient_wssecurity.php
 require_once 'UsernameToken.php';
 require_once 'varUsernameToken.php';
 //setting up the variables
 $ns1 = 'http://schemas.xmlsoap.org/ws/2003/06/secext';
 $wsdl = "http://localhost/WebServices/wsdl/po_headers.wsdl";
 //generating the hash
 $xmldoc = simplexml_load_file('purchaseOrder.xml');
 $pono = $xmldoc->pono;
 $hash=sha1($pono);
 //building WS-Security tags
 $usr = new SoapVar('usr', XSD_STRING,null,null,null,$ns1);
 $pswd = new SoapVar('pswd', XSD_STRING,null,null,null,$ns1);
 $tok = new UsernameToken($usr, $pswd);
 $token = new SoapVar($tok, SOAP_ENC_OBJECT,null,null,'UsernameToken',$ns1);
 $varToken = new varUsernameToken($token);
 $token = new SoapVar($varToken, SOAP_ENC_OBJECT,null,null,'UsernameToken',$ns1);
 $header = new SOAPHeader($ns1, 'Security', $token);
 //creating the client
 $client = new SoapClient($wsdl, array('trace' => 1));
 $client->__setSOAPHeaders($header);
 $podoc=$xmldoc->asXML();
 try {
  print $result=$client->placeOrder($podoc);
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
 print "REQUEST:\n".$client->__getLastRequest()."\n"; 
?>
