<?php

require_once "models/index_model.php";

session_start();
if(session_status() == PHP_SESSION_ACTIVE && !isset($_SESSION['usuario']) ) {
    session_unset();
    session_destroy();
    header("Location: " . $url . "/login.php");
    exit();
}

$index = new index_model();



$guardarDatos = false;
$concepto = '';
$fecha = '';
$cantidad = 0;


if(!empty($_POST['concepto']) && !empty($_POST['cantidad']) && !empty($_POST['fecha'])) {
    $guardarDatos = true;
    $concepto = $_POST['concepto'];
    $fecha = $_POST['fecha'];
    $cantidad = intval($_POST['cantidad']);

    $index->guardarGasto($concepto, $fecha, $cantidad);
}




require_once("views/index_view.php");

?>