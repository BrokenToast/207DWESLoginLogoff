<section>
    <form action="./index.php" method="post">
        <input type="submit" name="volver" value="volver">
    </form>
    <article>
        <h3>Error:<?php echo $aRespuestaError['code'];?></h3>
        <p><?php echo $aRespuestaError['mensaje'];?></p>
    </article>

</section>