<?php
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
if (isset($_REQUEST['enviar'])) {
    $ok = true;
    $aErrores['usuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['usuario'], 30, 2, 1);
    $aErrores['password'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'], 16, 3, 1);
    foreach ($aErrores as $value) {
        if (!empty($value)) {
            $ok = false;
        }
    }

    if ($ok) {
        $oConector = new processDB(DSNMYSQL, USER, PASSWORD);
        $aRespuesta = $oConector->executeQuery("SELECT * FROM T01_Usuario WHERE T01_CodUsuario=\"$_REQUEST[usuario]\" AND  T01_Password=SHA2(concat(\"$_REQUEST[usuario]\",\"$_REQUEST[password]\"),256)");
        if ($aRespuesta) {
            session_start();
            $_SESSION['usuario'] = $aRespuesta;
            if (isset($_COOKIE['idioma']) && $_REQUEST['idioma'] == $_COOKIE['idioma']) {
                $_SESSION['idioma'] = $_COOKIE['idioma'];
            } else {
                setcookie('idioma', $_REQUEST['idioma']);
                $_SESSION['idioma'] = $_REQUEST['idioma'];
            }
            $datosUpdate = [
                'T01_FechaHoraUltimaConexion' => time(),
                "T01_NumConexiones" => "1+T01_NumConexiones"
            ];
            $oConector->executeUpdate("T01_Usuario", $datosUpdate, "T01_CodUsuario='$_REQUEST[usuario]'");

            $_SESSION['paginaEnCurso'] = 'programa';
            header("Location: ./index.php");
        }
    }
} 

require_once $aVista['layout'];
