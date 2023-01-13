<?php
class Usuario{
    private string $codUsuario;
    private string $password;
    private string $descUsuario;
    private int $numAccesos;
    private DateTime $fechaHoraUltimaConexion;
    private DateTime $fechaHoraUltimaConexionAnterior;
    private string $perfil;
    public function __construct(string $codUsuario,string $password,string $descUsuario, int $numAccesos,int $fechaHoraUltimaConexion,int $fechaHoraUltimaConexionAnterior,string $perfil){
        $fecha = new DateTime();
        $this->codUsuario=$codUsuario;
        $this->password=$password;
        $this->descUsuario=$descUsuario;
        $this->numAccesos=$numAccesos+1;

        $fecha->setTimestamp($fechaHoraUltimaConexion);
        $this->fechaHoraUltimaConexion = $fecha;

        $fecha->setTimestamp($fechaHoraUltimaConexionAnterior);
        $this->fechaHoraUltimaConexionAnterior=$fecha;
        $this->perfil=$perfil;
    }
    /*codUsuario*/
    public function getCodUsuario(){
        return $this->codUsuario;
    }
    /*Password*/
    public function getPassword(){
        return $this->password;
    }
    /*DescUsuario*/
    public function getDescUsuario(){
        return $this->descUsuario;
    }
    /*NumAccesos*/
    public function getNumAccesos(){
        return $this->numAccesos;
    }
    /*FechaHoraUltimaConexion*/
    public function getFechaHoraUltimaConexion(){
        return $this->fechaHoraUltimaConexion;
    }
    /*FechaHoraUltimaConexionAnterior*/
    public function getFechaHoraUltimaConexionAnterior(){
        return $this->fechaHoraUltimaConexionAnterior;
    }
    /*Perfil*/
    public function getPerfil(){
        return $this->perfil;
    }
}