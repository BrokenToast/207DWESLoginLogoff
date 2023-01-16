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
// if (isset($_COOKIE['idioma']) && $_REQUEST['idioma'] == $_COOKIE['idioma']) {
//     setcookie('idioma', $_REQUEST['idioma']);
// } else {
//     setcookie('idioma', $_REQUEST['idioma']);
//     $_SESSION['idioma'] = $_REQUEST['idioma'];
// }

if(isset($_REQUEST['login'])){
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'login';

    header("Location: ./index.php");
    exit();
}
require_once "$aVista[layout]";
?>