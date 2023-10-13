<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from pedido where id = ?;");
    $sentencia->execute([$codigo]);
    $pedido = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($pedido);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre del cliente: </label>
                        <input type="text" class="form-control" name="txtNoCliente" autofocus required
                        value="<?php echo $pedido->nombres; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre del producto: </label>
                        <input type="text" class="form-control" name="txtNoProducto" autofocus required
                        value="<?php echo $pedido->nombre_producto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion: </label>
                        <input type="text" class="form-control" name="txtDireccion" autofocus required
                        value="<?php echo $pedido->direccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de entrega: </label>
                        <input type="date" class="form-control" name="txtFeEntrega" autofocus required
                        value="<?php echo $pedido->fecha_entrega; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Numero de celular: </label>
                        <input type="number" class="form-control" name="txtCelular" autofocus required
                        value="<?php echo $pedido->celular; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $pedido->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>