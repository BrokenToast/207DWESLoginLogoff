<section>
    <article>
        <form action="./index.php" method="post">
            <table>
                <tr>
                    <td>Nueva contraseña:</td>
                    <td>
                        <input type="password" name="newPassword" id="newPassword">
                    </td>
                </tr>
                <tr>
                    <td>Repita la contraseña</td>
                    <td>
                        <input type="password" name="repitPassword" id="repitPassword">
                    </td>
                </tr>
                <tr id="errores">
                    <?php
                        foreach($aErrores as $error){
                            ?> 
                            <td>
                                <?php echo $error;?>
                            </td>
                            <?php
                        }
                    ?>
                </tr>
                <tr>
                    <td><input type="submit" name="cambiar" value="Cambiar Contraseña"></td>
                </tr>
            </table>
        </form>
    </article>
</section>