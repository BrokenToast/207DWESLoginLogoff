<?php
if(isset($_REQUEST['login'])){
    $_SESSION['paginaEnCurso'] = 'login';

    header("Location: ./index.php");
    exit();
}
require_once "$aVista[layout]";
?>