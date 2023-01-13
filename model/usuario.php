<?php
    
class Usuario{
    private $codUsuario;
    private $password;
    private $descUsuario;
    private $numAccesos;
    private $fechaHoraUltimaConexion;
    private $fechaHoraUltimaConexionAnterior;
    private $perfil;
    public function __construct($codUsuario,$password,$descUsuario,$numAccesos,$fechaHoraUltimaConexion,$fechaHoraUltimaConexionAnterior,$perfil){
        $this->$codUsuario=$codUsuario;
        $this->$password=$password;
        $this->$descUsuario=$descUsuario;
        $this->$numAccesos=$numAccesos;
        $this->$fechaHoraUltimaConexion=$fechaHoraUltimaConexion;
        $this->$fechaHoraUltimaConexionAnterior=$fechaHoraUltimaConexionAnterior;
        $this->$perfil=$perfil;
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