<?php
$ok = "";
$aSelectorIdioma = [
    ['es', 'Español'],
    ['ct', 'Catalan'],
    ['pt', 'Portugues'],
    ['gl', 'Gallego']
];
if(isset($_COOKIE['idioma'])){
    switch ($_COOKIE['idioma']) {
        case 'ct':
            $aSelectorIdioma = [
                ['ct', 'Catalan'],
                ['es', 'Español'],
                ['pt', 'Portugues'],
                ['gl', 'Gallego']
            ];
            break;
        case 'pt':
            $aSelectorIdioma = [
                ['pt', 'Portugues'],
                ['es', 'Español'],
                ['ct', 'Catalan'],
                ['gl', 'Gallego']
            ];
            break;
        case 'gl':
            $aSelectorIdioma = [
                ['gl', 'Gallego'],
                ['es', 'Español'],
                ['ct', 'Catalan'],
                ['pt', 'Portugues']
            ];
            break;
    }
}
if(isset($_REQUEST['registrar'])){
    $ok = true;
    $aErrores['usuario']=validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'],30,2,1);
    $aErrores['password']=validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'],16,3,1);
    foreach($aErrores as $value){
        if(!empty($value)){
        $ok = false;        
        }
    }
}
if ($ok ) {
    if(!UsuarioPDO::validarCodNoExiste($_REQUEST['usuario'])){
        $oUsuario = new Usuario($_REQUEST['usuario'], hash("sha256",$_REQUEST['password']), $_REQUEST['descUsuario'], 1, time(), time(), "usuario");
        $_SESSION['usuariologinlogoff207'] = $oUsuario;
        UsuarioPDO::altaUsuario($oUsuario);
        $_SESSION['paginaEnCurso'] = 'inicioprivado';
        header("Location: ./index.php");
    }else{
        $aErrores['usuario'] = "ya existe";
    }
}
if(isset($_REQUEST['volver'])){
    $paginaAnterior=$_SESSION['paginaAnterior'];
    $paginaEnCuerso = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaAnterior'] = $paginaEnCuerso;
    $_SESSION['paginaEnCurso'] = $paginaAnterior;
    header('Location: ./index.php');
}
require_once $aVista['layout'];