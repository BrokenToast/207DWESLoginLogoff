<section>
    <?php 
        if(isset($_COOKIE['idioma'])){
            switch ($_COOKIE['idioma']) {
                case 'es':
                    ?> <h3>Bienvenido <?php print $_SESSION['usuarioMiAplicacion']->codUsuario?></h3> <?php
                    break;
                case 'pt':
                    ?> <h3>Bem-vindo <?php print $_SESSION['usuarioMiAplicacion']->codUsuario?></h3> <?php
                    break;
                case 'ct':
                    ?> <h3>Benvingut <?php print $_SESSION['usuarioMiAplicacion']->codUsuario?></h3> <?php
                    break;
                case 'gl':
                    ?> <h3>Benvido <?php print $_SESSION['usuarioMiAplicacion']->codUsuario?></h3> <?php
                    break;
            }
        }else{
            ?> <h3>Bienvenido <?php print $_SESSION['usuarioMiAplicacion']->codUsuario?></h3> <?php
        }
    ?>
        <form method="./programa.php" method="post">
            <input type="submit" name="detalles" value="Detalles">
            <input type="submit" name="mantenimiento" value="Mantenimiento Departamento">
            <input type="submit" name="editar" value="Editar Perfil">
            <input type="submit" name="salir" value="Salir">
        </form>
        <div>
            <p>
            <?php
                if($_SESSION['usuarioMiAplicacion']->numAccesos==1){
                    print('Es tu primera conexion');
                }else{
                    printf('Se a conectado %d <br>',$_SESSION['usuarioMiAplicacion']->numAccesos);
                    printf('La ultima conexion fue en %s',$_SESSION['usuarioMiAplicacion']->fechaHoraUltimaConexionAnterior->format('d-m-Y H:i:s'));
                }
            ?>
            </p>
        </div>
</section>