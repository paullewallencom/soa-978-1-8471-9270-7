<?php
    //getOrders.php
    $conn = mysql_connect('localhost', 'usr', 'pswd')
        or die("Failed to connect to database: ".mysql_error()); 
    mysql_select_db('my_db')
        or die("Failed to select database"); 
    $sql = "SELECT doc FROM purchaseOrders"; 
    $result = mysql_query($sql)
        or die("Failed to select data: ".mysql_error()); 
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    foreach ($line as $col_value) {
       echo $col_value;
     }
    }
    mysql_free_result($result);
    mysql_close($conn);
?>