<?php
if(isset($_REQUEST['volver'])){
    $paginaAnterior=$_SESSION['paginaAnterior'];
    $paginaEnCuerso = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaAnterior'] = $paginaEnCuerso;
    $_SESSION['paginaEnCurso'] = $paginaAnterior;
    header('Location: ./index.php');
}
$aRespuestaError['code'] = $_SESSION['error']->getCode();
$aRespuestaError['mensaje'] = $_SESSION['error']->getMessage();

require_once $aVista['layout'];

//=================== Clase error============================

