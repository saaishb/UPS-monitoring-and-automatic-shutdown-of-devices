<?php
include("config.php");
 

$id = $_GET['id'];
 

$result = $db->exec("DELETE FROM info WHERE id=$id");
 
header("Location:list.php");
?>
