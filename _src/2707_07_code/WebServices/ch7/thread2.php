<?php
 //File thread2.php
 class thread2 {
   function startThread2($salutation) {
    sleep(15);
    ob_start();
    var_dump($salutation. ' thread2. Current time: '.date("H:i:s"));
    $buffer = ob_get_flush();
    file_put_contents('thread2.txt', $buffer);
    ob_end_clean();
   }
 }
?>
