<div id="selectLenguage">
    <form action="./index.php" method="post">
        <select name="idioma" id="idioma">
            <?php
            foreach($aSelectorIdioma as $idioma){
                ?> 
                <option value="<?php echo $idioma[0];?>"><?php echo $idioma[1];?></option>
                <?php
            }
            ?>
        </select>
        <input type="submit" name="guardaridioma" value="guardar">
    </form>
</div>
<form action="./index.php" method="post">
    <input type="submit" name="login" value="Login">

</form>
