<?php
class UsuarioPDO{
    public static function validadUsuario(string $codUsuario,string $password){
        $conexion = new processDB(DSNMYSQL, USER, PASSWORD);
        $aUsuario=$conexion->executeQuery("SELECT * FROM T01_Usuario WHERE T01_CodUsuario='$codUsuario' AND T01_Password=SHA2('$password',256)");
        if(!count($aUsuario)){
            return null;
        }else{
            return new Usuario($aUsuario['T01_CodUsuario'],$aUsuario['T01_Password'],$aUsuario['T01_DescUsuario'],$aUsuario['T01_NumConexiones'],time(),$aUsuario['T01_FechaHoraUltimaConexion'],$aUsuario['T01_Perfil']);
        }
    }
    public static function altaUsuario(){
        
    }
    public static function modificarUsuario(){
        
    }
    public static function borrarUsuario(){
        
    }
    public static function validarCodNoExiste(){
        
    }
    
}