<section>
    <h3><?php echo $aRespuestaInicioPrivado['idioma']?></h3>
        <form method="./programa.php" method="post">
            <input type="submit" name="detalles" value="Detalles">
            <input type="submit" name="mantenimiento" value="Mantenimiento Departamento">
            <input type="submit" name="editar" value="Editar Perfil">
            <input type="submit" name="error" value="Error">
            <input type="submit" name="salir" value="Salir">
        </form>
        <div>
            <p>
            <?php echo $aRespuestaInicioPrivado['mensajeNumConexiones']; ?>
            </p>
        </div>
</section>