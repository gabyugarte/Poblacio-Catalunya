
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>


    
    <div class="container mt-5">
    <div class="row">
    <div class="col-sm-6 offset-sm-3">
    <div class="alert alert-danger text-center">
    <p>¿Desea confirmar la eliminacion del registro?</p>
    </div>

    <div class="row">
      
            <form action="includes/funciones.php" method="POST">
                <input type="hidden" name="accion" value="eliminar_registro">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <div class="botones">
                    <input type="submit" name="" value="Eliminar" class= "boton">
                    <a href="index.php" class="boton">Cancelar</a>
                </div>
            </form>             
        
    </div>