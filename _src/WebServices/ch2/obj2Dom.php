<?php
class obj2Dom {
 private $dom;
 private $rootNode;
 private $arrayName;

 public function __construct($rootElmName='root')
 {
  $this->dom = new DomDocument('1.0');
  $root = $this->dom->createElement($rootElmName);
  $this->rootNode = $this->dom->appendChild($root);
 }

 private function buildDom($result, $node) {
  $attrFlag=0;
  foreach($result as $key => $value) {
   if (!is_int($key)){
      $nodeName=$key;
   }
   else {
     $nodeName=$this->arrayName;
   }
   if ($attrFlag==1) {
     $node->setAttribute($nodeName,$value);
     continue;
   }

   if ($nodeName=='_') {
     $txt = $this->dom->createTextNode($value);
     $txt = $node->appendChild($txt);
     $attrFlag = 1;
     continue;
   }
        if (!is_object($value)){
         if (is_array($value)) {
          $this->arrayName=$key;
          $this->buildDom($value,$node);
         }
         else {
          $elm = $this->dom->createElement($nodeName);
          $elm = $node->appendChild($elm);
          $txt = $this->dom->createTextNode($value);
          $txt = $elm->appendChild($txt);
         }
        }
        else {
         $elm = $this->dom->createElement($nodeName);
         $elm = $node->appendChild($elm);
         $this->buildDom($value,$elm);
        }
      }
 }
 public function trans2Dom($result)
 {
  $this->buildDom($result, $this->rootNode);
 }
 public function printDomTree()
 {
  return $this->dom->saveXML();
 }
 public function elmToAttr($nodeName)
 {
   $items = $this->dom->getElementsByTagName($nodeName);
   $count= $items->length;
   for ($i = 0; $i < $count; $i++) {
      $node = $items->item(0);
      $parent = $node->parentNode;
      $parent->setAttribute($node->nodeName, $node->nodeValue);
      $parent->removeChild($parent->getElementsByTagName($nodeName)->item(0));
   }
 }
}
?>