<?php 
session_start();
session_destroy();
header("Location: http://localhost:8800/Connect+/index.php");
?>