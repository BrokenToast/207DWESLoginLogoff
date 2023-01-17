<?php

if (isset($_REQUEST['iniciar'])) {
    $ok = true;
    $aErrores['usuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 30, 2, 1);
    $aErrores['password'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'], 16, 3, 1);
    foreach ($aErrores as $value) {
        if (!empty($value)) {
            $ok = false;
        }
    }
    if ($ok) {
        $oUsuario = UsuarioPDO::validadUsuario($_REQUEST['usuario'], $_REQUEST['password']);
        if (!is_null($oUsuario)) {
            $_SESSION['usuarioMiAplicacion'] = $oUsuario;
            $_SESSION['codUsuarioEnCurso'] = $oUsuario->codUsuario;
            $oUsuario->numAccesos += 1;
            UsuarioPDO::modificarUsuario($oUsuario);
            $_SESSION['paginaEnCurso'] = 'inicioprivado';
            header("Location: ./index.php");
        }
    }
} 
if(isset($_REQUEST['registrarse'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'registrarse';
    header('Location: ./index.php');
}
if(isset($_REQUEST['volver'])){
    $paginaAnterior=$_SESSION['paginaAnterior'];
    $paginaEnCuerso = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaAnterior'] = $paginaEnCuerso;
    $_SESSION['paginaEnCurso'] = $paginaAnterior;
    header('Location: ./index.php');
}
require_once $aVista['layout'];
