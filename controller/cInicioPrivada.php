<?php
if(isset($_REQUEST['salir'])){
    $_SESSION['paginaEnCurso'] = 'iniciopublico';
    header('./index.html');
}
if(isset($_REQUEST['detalles'])){
    $_SESSION['paginaEnCurso'] = 'detalles';
    header('./index.html');
}
if(isset($_REQUEST['editar'])){
    $_SESSION['paginaEnCurso'] = 'micuenta';
    header('./index.html');
}
require_once $aVista['layout'];