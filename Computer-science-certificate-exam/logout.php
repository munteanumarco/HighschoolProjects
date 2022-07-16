<?php
session_start();
unset($_SESSION['username']);
header("Location: http://arduinocontrol.tk/index.html");
?>