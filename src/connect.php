<?php

$connectiondb = new mysqli("localhost", "root", "", "mydb_carmaker");

if($connectiondb->connect_error){
  die("Error during connection. Status: Error".$connectiondb->connect_error);
    
}

?>
