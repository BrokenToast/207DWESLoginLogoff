<?php
    require_once('./config/confAPP.php');
    session_start();
    if(!isset($_SESSION['vistaEnCurso'])){
        $_SESSION['vistaEnCurso'] = "iniciopublico";
    }
    require_once $aControlador[$_SESSION['vistaEnCurso']];
?>