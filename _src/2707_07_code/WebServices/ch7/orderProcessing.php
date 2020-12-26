<?php
 //File orderProcessing.php
 class orderProcessing {
   function startProcessing($partId, $quantity) {
    sleep(5);
    $item = "Part id: ".$partId. " Quantity: ".$quantity." Current time: ".date("H:i:s")."\n";
    $handle = fopen('orderProcessingLog.txt', 'a');
    fwrite($handle, $item);
    fclose($handle);
   }
 }
?>
