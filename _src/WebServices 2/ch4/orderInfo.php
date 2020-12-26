<?php
 //File orderInfo.php
 require_once "obj2Arr.php"; 
 class orderInfo {
   function getOrder($pono, $par) {
    $srv = simplexml_load_file('services.xml');
    $srv=obj2Arr($srv);
    foreach ($srv['service'] as $value)
    {
      $srvarr[$value['param']]=array("wsdl" => $value['wsdl'], "func" => $value['function']);
    }
    $client = new SoapClient($srvarr[$par]['wsdl']);
    try {
     $rslt=$client->$srvarr[$par]['func']($pono);
    }
    catch (SoapFault $exp) {
     throw new SoapFault("Server", $exp->getMessage());
    }
    return $rslt;
   }
 }
?>
