<section>
    <form action="./index.php" method="post">
        <input type="submit" name="volver" value="volver">
    </form>
    <article>
        <?php
            /**
            * Ejercicio 0
            * @author: Luis Pérez Astorga
            * @version: 1.0
            * @since: 
            */
            //Recorrido con un foreach la variable superglobal $_SERVER
            function printTable(array $dateTable, string $nameTable){
                ?><table>
                    <tr>
                        <th colspan="2"><?php print $nameTable; ?></th>
                    </tr>
                    <tr>
                        <th>Clave </th>
                        <th>Valor</th>
                    </tr>
                    <?php 
                        foreach($dateTable as $clave=>$valor){
                            ?>  
                            <tr>
                                <td><?php print $clave; ?></td>
                                <td>
                                    <?php
                                        if(is_array($valor)){
                                            printTable($valor,$clave);
                                        }else{
                                            print_r($valor);
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </table> 
                <?php
            }
                //Delcaración de un array con todas las superglobales
                $aVairablesSuper=[
                    "_SESSION"=>$_SESSION?? array(),
                    "_SERVER"=>$_SERVER,
                    "_GET"=>$_GET,
                    "_POST"=>$_POST,
                    "_FILES"=>$_FILES,
                    "_REQUEST"=>$_REQUEST,
                    "_ENV"=>$_ENV,
                    "_COOKIE"=>$_COOKIE,
                    "GLOBALS"=>$GLOBALS
                ];
                // Recorremos el  la array de SuperGlobales y la imprimimos como tablas;
                foreach($aVairablesSuper as $nameGlobalVar=>$aGlobalVar ){
                    //En caso de que la SuperGlobal este vaica muesta esta tabla;
                    if(empty($aGlobalVar)){
                        ?>
                        <table>
                            <tr>
                                <th><?php print $nameGlobalVar; ?></th>
                            </tr>
                            <tr>
                                <td>Esta vacia</td>
                            </tr>
                        </table> 
                        <?php
                    }else{
                    // En caso de que no este vacia muestra el contenido como en una tabla
                        printTable($aGlobalVar,$nameGlobalVar);
                    }
                }
            ?>
            <?php phpinfo() ?>
    </article>
</section>