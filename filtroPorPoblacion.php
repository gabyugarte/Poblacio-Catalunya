<?php 
require 'includes/conn.php';

// $CantidadMostrar=10;
// $compag = (int)(!isset($_GET['pag'])) ? 1 : $_GET['pag'];
$id = $_GET['id'];
$query= "SELECT * FROM poblacio_de_catalunya2 WHERE id = $id"; 
$result =$conexion->query($query);
// //Se divide la cantidad de registro de la BD con la cantidad a mostrar
// $TotalRegistro = ceil($TotalReg->num_rows/$CantidadMostrar);
// echo "<b>La cantidad de registro se dividió a: </b>". $TotalRegistro;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Població de Catalunya</title>
    <link rel="stylesheet" href="CSS/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<form method="post" action="eliminarMultiple.php">
            <div class="container-table">
                <div class="table-title"> DATOS POBLACIÓN EN CATALUÑA </div>
                <div class="table-header"> Año </div>
                <div class="table-header"> Código </div>
                <div class="table-header"> Nombre </div>
                <div class="table-header"> H de 0-14 años </div>
                <div class="table-header"> H de 15-64 años </div>
                <div class="table-header"> H de 65 años</div>
                <div class="table-header"> D de 0 a 14 años</div>
                <div class="table-header"> D de 15-65 años</div>
                <div class="table-header"> D de 65 años</div>
                <div class="table-header"> Acciones</div>
                <div class="table-header"> 
                   
                        <button type="submit" name="eliminar-multiple" class="boton-editar-eliminar">Eliminar</button>
                    
                </div>

                <?php 
                // $query2= $query . " LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar; 
                // $resultsPoblacionNombre = mysqli_query($conexion,$query2);
                while ($row = mysqli_fetch_assoc($result)){
                //variable para saber el número de resultados encontrados
                $numeroSql = mysqli_num_rows($result);?>

                <div class="table-item"><?= $row['Any'] ?> </div>
                <div class="table-item"><?= $row['Codi'] ?> </div>
                <div class="table-item"><?= $row['PoblacioNom'] ?></div>
                <div class="table-item"><?= $row['H_0_14'] ?> </div>
                <div class="table-item"><?= $row['H_15_64'] ?> </div>
                <div class="table-item"><?= $row['H_65'] ?> </div>
                <div class="table-item"><?= $row['D_0_14'] ?> </div>
                <div class="table-item"><?= $row['D_15_64'] ?> </div>
                <div class="table-item"><?= $row['D_65'] ?> </div>
                <div class="table-item">
                    <a class="boton-editar-eliminar" href="editar.php?id=<?php echo $row['id']?> ">
                    Editar </a><br>
                    <a class="boton-editar-eliminar" href="eliminar.php?id=<?php echo $row['id']?>">
                    Eliminar</a> 
                </div>
                <!-- checkbox -->
                <div class="table-item">
                    <input type="checkbox" name="eliminar-id[]" value="<?= $row['id'] ?>"/><br></a>
                    <!-- <input type="hidden" name="id" value="<?= $row['id'] ?>"/><br> -->
                </div>
                <?php } mysqli_free_result($result);?>
            
            </div>
            </form>
<br>
            <a href="index.php" class="boton-guardar-volver ">VOLVER</a>
