<?php
if(isset($_REQUEST['salir'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'iniciopublico';
    header('Location: ./index.php');
}
if(isset($_REQUEST['detalles'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'detalles';
    header('Location: ./index.php');
}
if(isset($_REQUEST['mantenimiento'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'wip';
    header('Location: ./index.php');
}

if(isset($_REQUEST['editar'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'micuenta';
    header('Location: ./index.php');
}
require_once $aVista['layout'];