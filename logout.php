<?php
session_start();
require_once "Environment.php";
        
unset($_SESSION['user_data']);
header("location: ". $HOST ."index.php");        

?>
