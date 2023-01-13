<?php 
    /*Librerias*/
    require_once('./core/221024ValidacionFormularios.php');
    require_once('./core/DB/processDB.php');
    /*Config*/
    require_once('./config/confDBPDO.php');
    /*Modelo*/
    //require_once('');
    /*Controlador*/
    $aControlador = [
        "iniciopublico" => "./controller/cInicioPublico.php",
        "login" => "./controller/cLogin.php",
    ];
    /*Vista*/
    $aVista = [
        "layout" => "./view/vLayout.php",
        "iniciopublico" => "./view/vInicioPublico.php",
        "login" => "./view/vLogin.php"
    ];
?>