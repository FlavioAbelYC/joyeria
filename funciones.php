<?php


function agregarTeclado($resultado, $id, $cantidad = 1){
    
    $_SESSION['carrito'][$id] = array(
        'IDteclado' => $resultado['IDteclado'],
        'titulo' => $resultado['titulo'],
        'foto' => $resultado['foto'],
        'precio' => $resultado['precio'],
        'cantidad' => $cantidad
   );


}

function actualizarTeclado($id,$cantidad = FALSE){

    if($cantidad)
        $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    else
        $_SESSION['carrito'][$id]['cantidad']+=1;
}


function calcularTotal(){

    $total = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
            $total += $value['precio'] * $value['cantidad'];
        }
    }
    return $total;

}

function cantidadTeclado(){
    $cantidad = 0;
    if(isset($_SESSION['carrito'])){
        foreach($_SESSION['carrito'] as $indice => $value){
           $cantidad++;
        }
    }

    return $cantidad;
}