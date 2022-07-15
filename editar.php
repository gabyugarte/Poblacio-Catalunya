<?php
//Usamos GET para recibir y editar datos--------------------------------
$id=$_GET["id"];
require_once 'includes/conn.php';
$consulta = "SELECT * FROM poblacio_de_catalunya2 WHERE id = $id";

// echo $consulta;
$resultado = mysqli_query($conexion,$consulta);
$row = mysqli_fetch_assoc($resultado);

?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</head>
<body>
<body id="page-top">


<form  action="includes/funciones.php" method="POST">
    <div id="login" >
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                        
                                <br>
                                <br>
                                <h3 class="text-center">Editar Registro</h3>
                                <div class="form-group">
                                <label for="Any" class="form-label">Año</label>
                                <input type="number"  id="Any" name="Any" class="form-control" value = "<?= $row['Any']; ?>" placeholder="aaaa">
                                </div>
                                <div class="form-group">
                                <label for="Codigo" class="form-label">Código</label>
                                <input type="number"  id="Codigo" name="Codi" class="form-control" value = "<?= $row['Codi']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="nombre">Nombre de la Población:</label><br>
                                    <input type="text" name="PoblacioNom" id="PoblacioNom" class="form-control" value = "<?= $row['PoblacioNom']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="H_0_14">Hombres de 0 a 14 años:</label><br>
                                    <input type="number" name="H_0_14" id="H_0_14" class="form-control" value = "<?= $row['H_0_14']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="H_15_64">Hombres de 15 a 64 años:</label><br>
                                    <input type="number" name="H_15_64" id="H_15_64" class="form-control" value = "<?= $row['H_15_64']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="H_65">Hombres de 65 años:</label><br>
                                    <input type="number" name="H_65" id="H_65" class="form-control" value = "<?= $row['H_65']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="D_0_14">Damas de 0 a 14 años:</label><br>
                                    <input type="number" name="D_0_14" id="D_0_14" class="form-control" value = "<?= $row['D_0_14']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="D_15_64">Damas de 15 a 64 años:</label><br>
                                    <input type="number" name="D_15_64" id="D_15_64" class="form-control" value = "<?= $row['D_15_64']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="D_65">Damas de 65 años:</label><br>
                                    <input type="number" name="D_65" id="D_65" class="form-control" value = "<?= $row['D_65']; ?>">
                                    <input type="hidden" name="accion" value="editar_registro">
                                    <input type="hidden" name="id" value="<?php echo $id;?>">
                                </div>
                        
                            <br>
                            
                                    <div class="mb-3 botones">
                                    
                                    <button type="submit" class="botones boton-guardar-volver ">Editar </button><br>
                                    <a href="index.php"  class ="botones boton-guardar-volver">VOLVER</a>
                                
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</form>

</body>
</html>