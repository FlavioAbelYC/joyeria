<?php

namespace Kawschool;

class Teclado{

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

    
    public function registrar($_params){
        $sql = "INSERT INTO `teclados`( `titulo`, `descripcion`, `foto`, `precio`, `categoriaID`, `fecha`) VALUES (:titulo, :descripcion, :foto, :precio, :categoriaID, :fecha)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":titulo" => $_params['titulo'],
            ":descripcion" => $_params['descripcion'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
            ":categoriaID" => $_params['categoriaID'],
            ":fecha" => $_params['fecha'],
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function actualizar($_params){
        $sql = "UPDATE `teclados` SET `titulo`=:titulo,`descripcion`=:descripcion,`foto`=:foto,`precio`=:precio,`categoriaID`=:categoriaID,`fecha`=:fecha  WHERE `IDteclado`=:IDteclado";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":titulo" => $_params['titulo'],
            ":descripcion" => $_params['descripcion'],
            ":foto" => $_params['foto'],
            ":precio" => $_params['precio'],
            ":categoriaID" => $_params['categoriaID'],
            ":fecha" => $_params['fecha'],
            ":IDteclado" =>  $_params['IDteclado']
        );

        if($resultado->execute($_array))//verifica 
            return true;

        return false;
    }

    public function eliminar($id){
        $sql = "DELETE FROM `teclados` WHERE `IDteclado`=:IDteclado ";

        $resultado = $this->cn->prepare($sql);
        
        $_array = array(
            ":IDteclado" =>  $id
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function mostrar(){
        $sql = "SELECT teclados.IDteclado,titulo, descripcion, foto, precio, fecha, estado FROM teclados
        INNER JOIN categoria
        ON teclados.categoriaID=categoria.ID 
        ORDER BY teclados.IDteclado DESC";
        
        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();//trae los registro como un arreglo

        return false;
    }

    public function mostrarPorId($id){
        
        $sql = "SELECT * FROM `teclados` WHERE `IDteclado`=:IDteclado ";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":IDteclado" =>  $id
        );

        if($resultado->execute($_array))
            return $resultado->fetch();//un registro

        return false;
    }


    
}



