<?php 
 //File: SoapClient_attr_price.php
 require_once "obj2Arr.php"; 
 $wsdl = "http://localhost/WebServices/wsdl/po_attr_price.wsdl";
 //$xmldoc = simplexml_load_file('purchaseOrder_attr.xml');
 $xml = new DOMDocument();
 $xml->load('po.xml');
 $xsl = new DOMDocument();
 $xsl->load('AttrsToElms.xsl');
 $proc = new XSLTProcessor;
 $proc->importStyleSheet($xsl);
 $poxml = $proc->transformToXML($xml);
 $xmldoc = simplexml_load_string($poxml);

 $xmlarr = obj2Arr($xmldoc);
 //var_dump($xmlarr);
 $client = new SoapClient($wsdl);
 try {
  print $result=$client->placeOrder($xmlarr);
 }
 catch (SoapFault $exp) {
  print $exp->getMessage();
 }
?>
