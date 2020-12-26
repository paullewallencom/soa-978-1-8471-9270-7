<?php
 //File thread1.php
 class thread1 {
   function startThread1($salutation) {
    sleep(15);
    ob_start();
    var_dump($salutation. ' thread1. Current time: '.date("H:i:s"));
    $buffer = ob_get_flush();
    file_put_contents('thread1.txt', $buffer);
    ob_end_clean();
   }
 }
?>
