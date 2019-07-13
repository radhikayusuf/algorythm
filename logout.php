<?php
session_start();

unset($_SESSION['user_data']);
header("location: http://192.168.64.2/algorythm/index.php");

?>
