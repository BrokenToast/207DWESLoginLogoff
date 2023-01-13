<form action="./index.php" method="post">
    <table id="tableForm">
        <tr>
            <td><label>Usuario</label></td>
            <td><input type="text" name="usuario"></td>
        </tr>
        <tr>
            <td><label>Password</label></td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td><label>Idioma</label></td>
            <td>
                <select name="idioma" id="idioma">
                    <?php
                    foreach($aSelectorIdioma as $idioma){
                        ?> 
                        <option value="<?php echo $idioma[0];?>"><?php echo $idioma[1];?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="enviar" value="Iniciar"></td>
            <td><a href="./registro.php">Registrarse</a></td>
        </tr>
    </table>
</form>