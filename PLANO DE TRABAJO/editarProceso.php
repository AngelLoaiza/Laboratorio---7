<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombres = $_POST['txtNoCliente'];
    $nombre_producto = $_POST['txtNoProducto'];
    $direccion = $_POST['txtDireccion'];
    $fecha_entrega = $_POST['txtFeEntrega'];
    $celular = $_POST['txtCelular'];

    $sentencia = $bd->prepare("UPDATE pedido SET nombres = ?, nombre_producto = ?, direccion = ?,fecha_entrega= ?,celular = ? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $nombre_producto, $direccion, $fecha_entrega, $celular,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }