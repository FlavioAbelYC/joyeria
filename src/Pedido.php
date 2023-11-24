<?php

namespace Kawschool;

class Pedido{

    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }

    public function registrar($_params){
        $sql = "INSERT INTO `pedidos`(`clienteID`, `total`, `fecha`) 
        VALUES (:clienteID,:total,:fecha)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":clienteID" => $_params['clienteID'],
            ":total" => $_params['total'],
            ":fecha" => $_params['fecha'],
            
        );
        if($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
        
    }
    public function registrarDetalle($_params){
        $sql = "INSERT INTO `detalle_pedido`(`pedidoID`, `tecladoID`, `cantidad`, `precio`) 
        VALUES (:pedidoID,:tecladoID,:cantidad,:precio)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":pedidoID" => $_params['pedidoID'],
            ":tecladoID" => $_params['tecladoID'],
            ":cantidad" => $_params['cantidad'],
            ":precio" => $_params['precio'],
        );

        if($resultado->execute($_array))
            return $this->cn->lastInsertId();

        return false;
    }

    public function mostrar()
    {
        $sql = "SELECT p.idPedido, nombre, apellido, email, total, fecha,comentario FROM pedidos p 
        INNER JOIN clientes c ON p.clienteID = c.idCliente ORDER BY p.idPedido DESC";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return  $resultado->fetchAll();

        return false;

    }
    public function mostrarUltimos()
    {
        $sql = "SELECT p.idPedido, nombre, apellido, email, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.clienteID = c.idCliente ORDER BY p.idPedido DESC LIMIT 10";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return  $resultado->fetchAll();

        return false;

    }

    public function mostrarPorId($id)
    {
        $sql = "SELECT p.idPedido, nombre, apellido, email, total, fecha FROM pedidos p 
        INNER JOIN clientes c ON p.clienteID = c.idCliente WHERE p.idPedido = :idPedido";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':idPedido'=>$id
        );

        if($resultado->execute($_array ))
            return  $resultado->fetch();

        return false;
    }

    

    public function mostrarDetallePorIdPedido($id)
    {
        $sql = "SELECT 
                dp.idPedido,
                pe.titulo,
                dp.precio,
                dp.cantidad,
                pe.foto
                FROM detalle_pedido dp
                INNER JOIN teclados pe ON pe.IDteclado= dp.tecladoID
                WHERE dp.pedidoID = :id";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ':id'=>$id
        );

        if($resultado->execute( $_array))
            return  $resultado->fetchAll();

        return false;

    }



}