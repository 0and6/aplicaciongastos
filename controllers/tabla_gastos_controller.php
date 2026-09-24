<?php

require_once "models/tabla_gastos_model.php";

session_start();
if(session_status() == PHP_SESSION_ACTIVE && !isset($_SESSION['usuario']) ) {
    session_unset();
    session_destroy();
    header("Location: " . $url . "/login.php");
    exit();
}


$tabla_gastos = new tabla_gastos_model();

$buscarDatos = false;
$concepto = '';
$fecha = '';
$cantidad = 0;

$clasificarDatos = false;

$result = null;

$fechaInicial = null;
$fechaFinal = null;

if(!empty($_GET['fechaInicial']) && !empty($_GET['fechaFinal']) ) {
    $fechaInicial = new datetime($_GET['fechaInicial']);
    $fechaFinal = new datetime($_GET['fechaFinal']);

    if($fechaInicial <= $fechaFinal) {
        $buscarDatos = true;
    } else {
        $buscarDatos = false;
    }
} else if(!empty($_GET['periodo'])) {
    $buscarDatos = True;
    switch($_GET['periodo']) {
        case 'semana':
            $fecha = new datetime($_GET['fecha']);
            $subdays = "P". $fecha->format("w") . "D";
            $fechaInicial = clone $fecha;
            $fechaInicial->sub(new DateInterval($subdays));
            $fechaFinal = clone $fechaInicial;
            $fechaFinal->add(new DateInterval("P6D"));
            break;
        case 'mes':
            $fecha = new datetime($_GET['fecha']);
            $subdays = "P" . ($fecha->format('d')-1) . "D";
            $fechaInicial = clone $fecha;
            $fechaInicial->sub(new DateInterval($subdays));
            $fechaFinal = clone $fechaInicial;
            $adddays = "P" . ($fecha->format("t") - 1) . "D";
            $fechaFinal->add(new DateInterval($adddays));

            break;
        case 'anio':
            $fecha = new DateTime($_GET['fecha']);
            $fechaInicial = new DateTime($fecha->format("Y") . "-01-01");
            $fechaFinal = new DateTime($fecha->format("Y") . "-12-31");
            break;
    }
} else if (!empty($_GET['eliminar'])) {
    $id_eliminar = intval($_GET['eliminar']);
    
    $dato_eliminado = $tabla_gastos->buscarGasto($id_eliminar);
    if(count($dato_eliminado) == 1) {
        $fechaInicial = new DateTime($dato_eliminado[0]['fecha']);
        $fechaFinal = new DateTime($dato_eliminado[0]['fecha']);
        
        $tabla_gastos->eliminarGasto($id_eliminar);
        
        $buscarDatos = true;
    } else {
        $buscarDatos = false;
    }
}



if($buscarDatos == true) {
    $result = $tabla_gastos->buscarGastos($fechaInicial->format('Y-m-d'), $fechaFinal->format('Y-m-d'));
} else {
    $fecha = new DateTime();
    $result = $tabla_gastos->buscarDia($fecha->format("Y-m-d"));
}




require_once("views/tabla_gastos_view.php");

?>