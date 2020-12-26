<?php 
 //File: UsernameToken.php
 class UsernameToken {
  private $Username;
  private $Password;
   public function __construct($Username, $Password) {
    $this->Username = $Username;
    $this->Password = $Password;
  }
 }
?>
