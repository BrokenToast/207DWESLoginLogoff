<?php
require_once('DBexception.php');
class processDB{
    /**
     * Clase que nos permite gestionar una base de datos.
     * @var PDO $oconexionDB Conexion a la base de datos
     */
    public readonly string $dsn;
    public readonly string $user;
    public readonly string $password;
    private PDO $oConexionDB;
    /**
     * 
     * @param PDO $conexionDB Conexion a la base de datos
     */
    public function __construct($dsn,$user,$password){
        $this->dsn=$dsn;
        $this->user=$user;
        $this->password = $password;
    }
    /**
     * Metodo que no permite lanzar un quiery y nos devuelve la información en una array
     * @param string $query Query que se va a ejecutar.
     * @throws DBexception Se lanza cuando hay un error con el query
     * @return array devuelve una array con la información del Quer(Formato: [[tupla1],[tupla..],[tupla..]]) o [tupla] y si no hay resultado devuelve false. 
     */
    public function executeQuery(string $query){
        $this->__wakeup();
        try{
            $oResultado=$this->oConexionDB->query($query);
            if($oResultado->rowCount()>1){
                $aresultado = [];
                $tupla=$oResultado->fetch(PDO::FETCH_ASSOC);
                while(!is_bool($tupla)){
                    array_push($aresultado, $tupla);
                    $tupla=$oResultado->fetch(PDO::FETCH_ASSOC);
                }
                return $aresultado;
            }else{
                return $oResultado->fetch(PDO::FETCH_ASSOC);
            }
        }catch(PDOException $error){
            throw new DBexception($error);
        }finally{
            unset($oConexionDB);
        }
        
    }
    public  function executeInsert(string $tabla,array $aDatos){
        $this->__wakeup();
        try {
            if(is_array($aDatos[0])){
                foreach ($aDatos as $value) {
                    $data = $this->transforDataStringInsert($value);
                    $this->oConexionDB->exec("insert into $tabla values($data)");
                }
            }else{
                $data = $this->transforDataStringInsert($aDatos);
                $this->oConexionDB->exec("insert into $tabla values($data)");
            }
        } catch (PDOException $th) {
            throw new DBexception($th->getMessage());
        }finally{
            unset($this->oConexionDB);
        }
    }
    /**
     * Inacabado
     * @param mixed $tabla
     * @param mixed $aDatos
     * @param mixed $condición
     * @throws DBexception
     * @return void
     */
    public  function executeUpdate(string $tabla, array $aDatos, string $condición){
        $this->__wakeup();
        try {
            if(is_array($aDatos[array_keys($aDatos)[0]])){
                foreach ($aDatos as $value) {
                    $data = $this->transforDataStringUpdate($value);
                    $this->oConexionDB->exec("UPDATE $tabla SET $data WHERE $condición");
                }
            }else{
                $data = $this->transforDataStringUpdate($aDatos);
                $this->oConexionDB->exec("UPDATE $tabla SET $data WHERE $condición");
            }
        } catch (PDOException $th) {
            throw new DBexception($th->getMessage());
        }finally{
            unset($this->oConexionDB);
        }
    }
    public  function executeDelete(string $tabla,string $condición="",bool $deleteAll=false){
        if(empty($condición) && !$deleteAll){
            throw new DBexception("No has puesto condición");
        }else{
            $this->__wakeup();
            try {
                return $this->oConexionDB->exec("DELETE FROM $tabla where $condición");
            } catch (PDOException $th) {
                throw new DBexception($th->getMessage());
            }finally{
                unset($this->oConexionDB);
            }
        }
    }
    public function __wakeup(){
        $this->oConexionDB = new PDO($this->dsn,$this->user,$this->password);
    }
    private function transforDataStringInsert(array $aData){
        $dataFormat="";
        $numDatas=count($aData);
        for ($i=0; $i<$numDatas ; $i++) { 
            $dataFormat=sprintf("%s%s",$dataFormat,(($i==$numDatas-1)? $this->selectSingelType($aData[$i]) : $this->selectSingelType($aData[$i]).","));
        }
        return $dataFormat;
    }
    private function transforDataStringUpdate(array $aData){
        $data="";
        $numDatas=count($aData);
        $dataFormat = "";
        $aColumName = array_keys($aData);
        for ($i=0; $i<$numDatas ; $i++) {
            $columna=sprintf("%s=%s",$aColumName[$i],($this->selectSingelType($aData[$aColumName[$i]],true)));
            $dataFormat=sprintf("%s%s",$dataFormat,(($i==$numDatas-1)? $columna : $columna.","));
        }
        return $dataFormat;
    }
    private function selectSingelType(mixed $data, bool $isUpdate=false){
        if(is_string($data)){
            if($isUpdate && preg_match("/[\+\-%\*\/]/i",$data)){
                return $data;
            }
            return "'$data'";
        }else{
            return "$data";
        }
    }
}