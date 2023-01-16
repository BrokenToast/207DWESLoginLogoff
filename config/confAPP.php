<?php 
    /*Librerias*/
    require_once('./core/221024ValidacionFormularios.php');
    require_once('./core/DB/processDB.php');
    /*Config*/
    require_once('./config/confDBPDO.php');
    /*Modelo*/
    require_once('./model/usuario.php');
    require_once('./model/UsuarioPDO.php');
    /*Controlador*/
    $aControlador = [
        "iniciopublico" => "./controller/cInicioPublico.php",
        "inicioprivado" => "./controller/cInicioPrivada.php",
        "login" => "./controller/cLogin.php",
        "detalles"=>"./controller/cDetalles.php",
        "registrarse"=>"./controller/cRegistrarse.php",
        "micuenta"=>"./controller/cMiCuenta.php",
        "changepassword"=>"./controller/cChangePassword.php"
    ];
    /*Vista*/
    $aVista = [
        "layout" => "./view/vLayout.php",
        "login" => "./view/vLogin.php",
        "iniciopublico" => "./view/vInicioPublico.php",
        "inicioprivado" => "./view/vInicioPrivada.php",
        "detalles"=>"./view/vDetalles.php",
        "registrarse"=>"./view/vRegistrarse.php",
        "micuenta"=>"./view/vMiCuenta.php",
        "changepassword"=>"./view/vChangePassword.php"
    ];
?>