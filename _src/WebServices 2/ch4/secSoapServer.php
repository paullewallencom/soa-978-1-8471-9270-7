<?php
class secSoapServer extends SoapServer {
 function handle($pack) {
  $env = simplexml_load_string($pack);      
  $hash= $env->xpath('//ns1:hash');
  $hash = (string) $hash[0];
  $po= $env->xpath('//po');
  $po = simplexml_load_string((string)$po[0]); 
  $pono = $po->xpath('//pono');
  $pono = (string)$pono[0];
  $pswd=sha1($pono);   
  if ($pswd!=$hash) {
        throw new SoapFault("Server","You're not authorized to consume this service"); 
  };
  parent::handle();
 }
}
?>
