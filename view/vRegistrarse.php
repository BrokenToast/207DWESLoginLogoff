<section>
    <article>
    <form action="./index.php" method="post">
        <input type="submit" name="volver" value="volver">
            <table id="tableForm">
                <tr>
                    <td><label>Usuario*</label></td>
                    <td><input type="text" name="usuario" value="<?php echo (!isset($aErrores['usuario'])) ? $_REQUEST['usuario']:"";?>"></td>
                </tr>
                <tr>
                    <td><label>Password*</label></td>
                    <td><input type="password" name="password" value="<?php echo (!isset($aErrores['password'])) ? $_REQUEST['password']:"";?>"></td>
                </tr>
                <tr>
                    <td><label>Descripcion del Usuario</label></td>
                    <td>
                        <textarea name="descUsuario" id="descUsuario" cols="20" rows="4"><?php echo (isset($_REQUEST['registrar'])) ? $_REQUEST['descUsuario']:"";?></textarea>
                    </td>
                </tr>
                <tr>
                    <td><label>Imagen</label></td>
                    <td><input type="file" name="imagen" value="<?php echo (isset($_REQUEST['registrar'])) ? $_REQUEST['imagen']:"";?>"></td>
                </tr>
                <tr id="errores">
                    <td colspan="2">
                        <ul>
                        <?php
                        foreach($aErrores?? [] as $nombreCampo=>$error){
                            if(!empty($error)){
                                ?> <li style="color:red;"> <?php echo $nombreCampo.":".$error?></li> <?php
                            }
                        }
                        ?>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="registrar" value="registrar"></td>
                </tr>
            </table>
    </article>
</section>