<?php
class Usuario{
    public string $codUsuario;
    public string $password;
    public string $descUsuario;
    public int $numAccesos;
    public readonly DateTime $fechaHoraUltimaConexion;
    public readonly DateTime $fechaHoraUltimaConexionAnterior;
    public string $perfil;
    public function __construct(string $codUsuario,string $password,string $descUsuario, int $numAccesos,int $fechaHoraUltimaConexion,int $fechaHoraUltimaConexionAnterior,string $perfil){
        
        $this->codUsuario=$codUsuario;
        $this->password=$password;
        $this->descUsuario=$descUsuario;
        $this->numAccesos=$numAccesos;
        $fecha = new DateTime();
        $fecha->setTimestamp($fechaHoraUltimaConexion);
        $this->fechaHoraUltimaConexion = $fecha;
        $fechaAnterior = new DateTime();
        $fechaAnterior->setTimestamp($fechaHoraUltimaConexionAnterior);
        $this->fechaHoraUltimaConexionAnterior=$fechaAnterior;
        $this->perfil=$perfil;
    }
}