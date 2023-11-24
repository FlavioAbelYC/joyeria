<?php

session_start();
$_SESSION['usuario_info']['nombre_usuario']=array();
header('Location: index.php');