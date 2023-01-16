<section>
    <article>
        <form action="./index.php" method="post">
            <input type="submit" name="volver" value="Volver">
            <table>
                <tr>
                    <td>Usuario:</td>
                    <td>
                        <input type="text" name="userName" id="userName" value="<?php echo $_SESSION['usuarioMiAplicacion']->codUsuario;?>">
                    </td>
                </tr>
                <tr>
                    <td>Descripción del usuario:</td>
                    <td>
                        <textarea name="descUsuario" id="descUsuario" cols="20" rows="4"><?php echo $_SESSION['usuarioMiAplicacion']->descUsuario;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Fecha ultima conexión:</td>
                    <td>
                        <input disabled type="text" name="fechaUltima" id="fechaUltima" value="<?php echo $_SESSION['usuarioMiAplicacion']->fechaHoraUltimaConexion->format('d-m-Y H:i:s');?>">
                    </td>
                </tr>
                <tr>
                    <td>Numero de conexiones:</td>
                    <td>
                        <input disabled type="number" name="numeroConexiones" id="numeroConexiones" value="<?php echo $_SESSION['usuarioMiAplicacion']->numAccesos;?>">
                    </td>
                </tr>
                <tr>
                    <td>Tipo de perfil:</td>
                    <td>
                        <input disabled type="text" name="tipoPerfil" id="tipoPerfil" value="<?php echo $_SESSION['usuarioMiAplicacion']->perfil;?>">
                    </td>
                </tr>
                <tr>  
                    <td style="color:green;"><?php echo ($ok??false) ? "Se a modificado con exito" : ""; ?></td>     
                    <?php
                    foreach($aErrores ?? [] as $nombreCampo=>$error){
                        if(!empty($error)){
                            ?> <li style="color:red;"> <?php echo $nombreCampo.":".$error?></li> <?php
                        }
                    }
                    ?>
                </tr>
                <tr>
                    <td><input type="submit" name="changeUser" value="Editar perfil"></td>
                </tr>
            </table>
        </form>
    </article>
    <article>
        <form action="./index.php" method="post">
            <h3>Cambiar contraseña o borrar cuenta</h3>
            <table>
                <tr>
                    <td>Introduce contraseña:</td>
                    <td><input type="password" name="currentPassword" id="currentPassword"></td>
                    <td></td>
                </tr>
                <tr>
                    <td><input type="submit" name="changePassword" value="Cambiar contraseña"></td>
                    <td><input type="submit" name="borrar" value="Borrar Cuenta"></td>
                </tr>
            </table>
        </form>
    </article>
</section>