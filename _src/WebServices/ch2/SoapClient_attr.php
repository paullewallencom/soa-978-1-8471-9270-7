<?php 
 //File: SoapClient_attr.php
 require_once "obj2Arr.php"; 
 $wsdl = "http://localhost/WebServices/wsdl/po_attr.wsdl";
 $xml = new DOMDocument();
 $xml->load('po.xml');
 $xsl = new DOMDocument();
 $xsl->load('AttrsToElms.xsl');
 $proc = new XSLTProcessor;
 $proc->importStyleSheet($xsl);
 $poxml = $proc->transformToXML($xml);

 $xmldoc = simplexml_load_string($poxml);
 $xmlarr = obj2Arr($xmldoc);
 $client = new SoapClient($wsdl);
 try {
  print $result=$client->placeOrder($xmlarr);
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
?>
