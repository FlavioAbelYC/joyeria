<?php
require '../vendor/autoload.php';

$teclado = new Kawschool\Teclado;

if($_SERVER['REQUEST_METHOD'] ==='POST'){ //mensajes para ejecutar si llego por POST

    if ($_POST['accion']==='Registrar'){

        if(empty($_POST['titulo']))
            exit('Completar titulo');
        
        if(empty($_POST['descripcion']))
            exit('Completar descripcion');

        if(empty($_POST['categoriaID']))
            exit('Seleccionar una Categoria');

        if(!is_numeric($_POST['categoriaID']))
            exit('Seleccionar una Categoria válida');

        
        $_params = array(
            'titulo'=>$_POST['titulo'],
            'descripcion'=>$_POST['descripcion'],
            'foto'=> subirFoto(),
            'precio'=>$_POST['precio'],
            'categoriaID'=>$_POST['categoriaID'],
            'fecha'=> date('Y-m-d')
        );

        $rpt = $teclado->registrar($_params);
        
        if($rpt)
        header('Location: teclados/index.php');
    else
        print 'Error al eliminar una Teclado';

    }

    if ($_POST['accion']==='Actualizar'){//asdfasdfsdfasdfasdfasdf

        if(empty($_POST['titulo']))
        exit('Completar titulo');
    
    if(empty($_POST['descripcion']))
        exit('Completar titulo');

    if(empty($_POST['categoriaID']))
        exit('Seleccionar una Categoria');

    if(!is_numeric($_POST['categoriaID']))
        exit('Seleccionar una Categoria válida');

    
    $_params = array(
        'IDteclado'=>$_POST['IDteclado'],
        'titulo'=>$_POST['titulo'],
        'descripcion'=>$_POST['descripcion'],
        'precio'=>$_POST['precio'],
        'categoriaID'=>$_POST['categoriaID'],
        'fecha'=> date('Y-m-d'),
        
    );

    if(!empty($_POST['foto_temp']))
        $_params['foto'] = $_POST['foto_temp'];
    
    if(!empty($_FILES['foto']['name']))
        $_params['foto'] = subirFoto();

    $rpt = $teclado->actualizar($_params);
    if($rpt)
        header('Location: teclados/index.php');
    else
        print 'Error al actualizar ';

    }

}
if($_SERVER['REQUEST_METHOD'] ==='GET'){

    $id = $_GET['id'];

    $rpt = $teclado->eliminar($id);
    
    if($rpt)
        header('Location: teclados/index.php');
    else
        print 'Error al eliminar una pelicula';


}


function subirFoto() {

    $carpeta = __DIR__.'/../upload/';

    $archivo = $carpeta.$_FILES['foto']['name'];

    move_uploaded_file($_FILES['foto']['tmp_name'],$archivo);

    return $_FILES['foto']['name'];//retorna foto y nombre


}




