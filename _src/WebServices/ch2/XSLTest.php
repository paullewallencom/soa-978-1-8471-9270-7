<?php
 //File: XSLTest.php
 $xml = new DOMDocument();
 $xml->load('po.xml');
 $xsl = new DOMDocument();
 $xsl->load('AttrsToElms.xsl');
 $proc = new XSLTProcessor;
 $proc->importStyleSheet($xsl);
 print $proc->transformToXML($xml);
?>
