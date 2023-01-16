<?php
 $aErrores = [
    'userName'=>'',
    'descUsuario'=>'',
    'userExist'=>''
];
$ok = "";
$codUsuarioAnterior=$_SESSION['usuarioMiAplicacion']->codUsuario;

$usuario = "";
if(isset($_REQUEST['changeUser'])){
    $ok = true;
    $aErrores['userName']=validacionFormularios::comprobarAlfabetico($_REQUEST['userName'], 30, 2, 1);
    $aErrores['descUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descUsuario'], 250, 2, 1);
    if(UsuarioPDO::validarCodNoExiste("$_REQUEST[userName]")){
        $aErrores['userExist'] = "El nombre del usuario ya existe";
    }
    foreach($aErrores as $error){
        if(!empty($error)){
            $ok = false;
        }
    }
}
if($ok){
    $_SESSION['usuarioMiAplicacion']->codUsuario = $_REQUEST['userName'];
    $_SESSION['usuarioMiAplicacion']->descUsuario=$_REQUEST['descUsuario'];
    UsuarioPDO::modificarUsuario($_SESSION['usuarioMiAplicacion'], $codUsuarioAnterior);
}else{
    $okPassword = false;
    if(empty(validacionFormularios::comprobarAlfaNumerico($_REQUEST['currentPassword']??null,16,3,1)) && !is_null(UsuarioPDO::validadUsuario($_SESSION['usuarioMiAplicacion']->codUsuario,$_REQUEST['currentPassword']))){
        $okPassword = true;
    }
    if(isset($_REQUEST['changePassword']) && $okPassword){
        $_SESSION['paginaEnCurso'] = 'changepassword';
        header("Location: ./index.php");
    }
    if(isset($_REQUEST['borrar']) && $okPassword){
        if(UsuarioPDO::borrarUsuario($_SESSION['usuarioMiAplicacion']->codUsuario)==1){
            $_SESSION['paginaEnCurso'] = 'iniciopublico';
            header("Location: ./index.php");
        }
    }
}

if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = 'inicioprivado';
    header('./index.html');
}
require_once $aVista['layout'];
