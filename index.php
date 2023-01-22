<?php
    require_once('./config/confAPP.php');
    session_start();
    ob_start();
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = "iniciopublico";
    }
    require_once $aControlador[$_SESSION['paginaEnCurso']];
?>