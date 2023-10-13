<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNoCliente"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtNoProducto"]) || empty($_POST["txtFeEntrega"]) || empty($_POST["txtCelular"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$nombres = $_POST["txtNoCliente"];
$direccion = $_POST["txtDireccion"];
$nombre_producto = $_POST["txtNoProducto"];
$fecha_entrega = $_POST["txtFeEntrega"];
$celular = $_POST["txtCelular"];

$sentencia = $bd->prepare("INSERT INTO pedido(nombres,direccion,nombre_producto,fecha_entrega,celular) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$nombres, $direccion, $nombre_producto, $fecha_entrega, $celular]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}