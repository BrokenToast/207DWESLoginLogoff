<?php
$aErrores = [];
$ok="";
if(isset($_REQUEST['cambiar'])){
    $ok=true;
    $aErrores['newPassword']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['newPassword'],16,3,1);
    $aErrores['repitPassword']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['repitPassword'],16,3,1);
    if($_REQUEST['newPassword']!=$_REQUEST['repitPassword']){
        $aErrores['iguales'] = "No son iguales";
    }
    foreach($aErrores as $value){
        if(!empty($value)){
        $ok = false;        
        }
    }
}
if($ok){
    $_SESSION['usuarioMiAplicacion']->password=hash("sha256",$_REQUEST['newPassword']);
    UsuarioPDO::modificarUsuario($_SESSION['usuarioMiAplicacion'],$_SESSION['usuarioMiAplicacion']->codUsuario);
    $_SESSION['paginaEnCurso']="micuenta";
    header("Location: ./index.php");
}
require_once $aVista['layout'];