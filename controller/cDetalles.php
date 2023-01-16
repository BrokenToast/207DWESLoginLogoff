<?php
if(isset($_REQUEST['volver'])){
    $_SESSION['paginaEnCurso'] = 'inicioprivado';
    header('./index.html');
}
require_once $aVista['layout'];