<?php
class UsuarioPDO{
    public static function validadUsuario(string $codUsuario,string $password){
        $conexion = new processDB(DSNMYSQL, USER, PASSWORD);
        $aUsuario=$conexion->executeQuery("SELECT * FROM T01_Usuario WHERE T01_CodUsuario='$codUsuario' AND T01_Password=SHA2('$password',256)");
        if(!$aUsuario){
            return null;
        }else{
            $fechaUltimaConexion = time();
            return new Usuario($aUsuario['T01_CodUsuario'],$aUsuario['T01_Password'],$aUsuario['T01_DescUsuario'],$aUsuario['T01_NumConexiones'],$fechaUltimaConexion,$aUsuario['T01_FechaHoraUltimaConexion'],$aUsuario['T01_Perfil']);
        }
    }
    public static function altaUsuario(Usuario $usuario){
        $conexion = new processDB(DSNMYSQL, USER, PASSWORD);
        $aDatosInsert = [
            $usuario->codUsuario,
            $usuario->password,
            $usuario->descUsuario,
            $usuario->fechaHoraUltimaConexion->getTimestamp(),
            $usuario->numAccesos,
            $usuario->perfil,
            0
        ];
        return $conexion->executeInsert("T01_Usuario", $aDatosInsert);
    }
    public static function modificarUsuario(Usuario $usuario,string $codUsuario=null){
        $conexion = new processDB(DSNMYSQL, USER, PASSWORD);
        $datos=[
            "T01_CodUsuario"=>$usuario->codUsuario,
            "T01_Password"=>$usuario->password,
            "T01_DescUsuario"=>$usuario->descUsuario,
            "T01_FechaHoraUltimaConexion"=>$usuario->fechaHoraUltimaConexion->getTimestamp(),
            "T01_NumConexiones"=>$usuario->numAccesos,
            "T01_Perfil"=>$usuario->perfil,
        ];
        if(is_null($codUsuario)){
            $condicion="T01_CodUsuario='$usuario->codUsuario'";
        }else{
            $condicion="T01_CodUsuario='$codUsuario'";
        }
        return $conexion->executeUpdate("T01_Usuario",$datos,$condicion);
    }
    public static function borrarUsuario(string $codUsuario){
        $conexion = new processDB(DSNMYSQL, USER, PASSWORD);
        return $conexion->executeDelete("T01_Usuario", "T01_CodUsuario='$codUsuario'");
    }
    public static function validarCodNoExiste(string $codUsuario){
        $conexion = new processDB(DSNMYSQL, USER, PASSWORD);
        $usuario = $conexion->executeQuery("SELECT T01_CodUsuario FROM T01_Usuario WHERE T01_CodUsuario='$codUsuario'");
        if($usuario){
            return true;
        }else{
            return false;
        }
    }
    
}