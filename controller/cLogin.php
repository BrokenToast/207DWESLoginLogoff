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
            //Idioma
            if (isset($_COOKIE['idioma']) && $_REQUEST['idioma'] == $_COOKIE['idioma']) {
                setcookie('idioma', $_REQUEST['idioma']);
            } else {
                setcookie('idioma', $_REQUEST['idioma']);
                $_SESSION['idioma'] = $_REQUEST['idioma'];
            }
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
    header('./index.html');
}
if(isset($_REQUEST['volver'])){
    $paginaAnterior=$_SESSION['paginaAnterior'];
    $paginaEnCuerso = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaAnterior'] = $paginaEnCuerso;
    $_SESSION['paginaEnCurso'] = $paginaAnterior;
    header('./index.html');
}
require_once $aVista['layout'];
