<?php

require_once './data/datos.php';
session_start();
session_unset();
session_destroy();
header("Location: " . $url . "/login.php");

?>