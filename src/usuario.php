<?php

namespace Kawschool;

class Usuario{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;
        //print '<pre></pre>';   //visualizar
        //print_r($this->config);
        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }
    public function login($nombre, $clave){
        
        $sql = "SELECT nombre_usuario FROM `usuarios` WHERE nombre_usuario = :nombre and clave = :clave";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":nombre" =>  $nombre,
            ":clave" =>  $clave
        );

        if($resultado->execute($_array))
            return $resultado->fetch();//un registro

        return false;
    }

    //SELECT * FROM `usuarios` WHERE nombre_usuario = 'user' and clave ='123'
    
}