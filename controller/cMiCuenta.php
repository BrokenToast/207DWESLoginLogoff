<?php
 $aErrores = [
    'userName'=>'',
    'descUsuario'=>'',
    'userExist'=>''
];
$ok = "";
$codUsuarioAnterior=$_SESSION['usuariologinlogoff207']->codUsuario;

$usuario = "";
if(isset($_REQUEST['changeUser'])){
    $ok = true;
    $aErrores['userName']=validacionFormularios::comprobarAlfabetico($_REQUEST['userName'], 30, 2, 1);
    $aErrores['descUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descUsuario'], 250, 2, 1);
    foreach($aErrores as $error){
        if(!empty($error)){
            $ok = false;
        }
    }
}
if($ok){
    $_SESSION['usuariologinlogoff207']->descUsuario=$_REQUEST['descUsuario'];
    if(!UsuarioPDO::validarCodNoExiste("$_REQUEST[userName]")){
        $_SESSION['usuariologinlogoff207']->codUsuario = $_REQUEST['userName'];
    }else{
        $aErrores["codUser"] = "El nombre de usuario no esta disponible";
    }
    UsuarioPDO::modificarUsuario($_SESSION['usuariologinlogoff207'], $codUsuarioAnterior);
    header("Location: ./index.php");
}else{
    $okPassword = false;
    if(empty(validacionFormularios::comprobarAlfaNumerico($_REQUEST['currentPassword']??null,16,3,1)) && !is_null(UsuarioPDO::validadUsuario($_SESSION['usuariologinlogoff207']->codUsuario,$_REQUEST['currentPassword']))){
        $okPassword = true;
    }
    if(isset($_REQUEST['changePassword']) && $okPassword){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'changepassword';
        header("Location: ./index.php");
    }
    if(isset($_REQUEST['borrar']) && $okPassword){
        if(UsuarioPDO::borrarUsuario($_SESSION['usuariologinlogoff207']->codUsuario)==1){
            $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso'] = 'iniciopublico';
            header("Location: ./index.php");
        }
    }
}

if(isset($_REQUEST['volver'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = "inicioprivado";
    header('Location: ./index.php');
}

$aRespuestaMiCuenta = [];
$aRespuestaMiCuenta['codUsuario']=$_SESSION['usuariologinlogoff207']->codUsuario;
$aRespuestaMiCuenta['descUsuario']=$_SESSION['usuariologinlogoff207']->descUsuario;
$aRespuestaMiCuenta['fechaHoraUltimaConexion']=$_SESSION['usuariologinlogoff207']->fechaHoraUltimaConexion->format('d-m-Y H:i:s');
$aRespuestaMiCuenta['numAccesos']=$_SESSION['usuariologinlogoff207']->numAccesos;
$aRespuestaMiCuenta['perfil'] = $_SESSION['usuariologinlogoff207']->perfil;
require_once $aVista['layout'];
