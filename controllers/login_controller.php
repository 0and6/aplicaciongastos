<?php
require_once('data/datos.php');
require_once "models/login_model.php";

$login = new login_model();

if(!empty($_POST['user']) && !empty($_POST['password'])) {
    
    $contrasenia = htmlspecialchars($_POST['password']);
    $usuario = htmlspecialchars($_POST['user']);

    $result = $login->validar_usuario($_POST['user']);

    if(count($result) == 1 && password_verify($contrasenia, $result[0]['password'])) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header("Location: " .    $url . "/index.php");
        exit();
        
    }
}


require_once("views/login_view.php");


?>