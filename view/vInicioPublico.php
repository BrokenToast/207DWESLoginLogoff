<form action="./index.php" method="post">
    <input type="submit" name="login" value="Login">
    <select name="idioma" id="idioma">
        <?php
        foreach($aSelectorIdioma as $idioma){
            ?> 
            <option value="<?php echo $idioma[0];?>"><?php echo $idioma[1];?></option>
            <?php
        }
        ?>
    </select>
</form>
