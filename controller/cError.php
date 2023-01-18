<?php
class ErrorLoginLogoff extends Exception{
    public function __construct(int $code,string $mensaje){
        $this->code=$code;
        $this->message = $mensaje;
    }
    public function llamarVError(){
        
    }
}