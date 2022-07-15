<?php include 'includes/conn.php'; 


if(isset($_POST['registrar'])){

    if(strlen($_POST['Any']) >=0 && strlen($_POST['Codi'])  >=0 && strlen($_POST['PoblacioNom'])  >=0 
    && strlen($_POST['H_0_14'])  >=0 && strlen($_POST['H_15_64']) >=0 && strlen($_POST['H_65'])  >=0 && strlen($_POST['D_0_14']) >=0 && strlen($_POST['D_15_64']) >1 && strlen($_POST['D_65']) >0){
        $any = ($_POST['Any']);
        $codigo = ($_POST['Codi']);
        $poblacioNom = ($_POST['PoblacioNom']);
        $H_0_14 = ($_POST['H_0_14']);
        $H_15_64 = ($_POST['H_15_64']);
        $H_65 = ($_POST['H_65']);
        $D_0_14 = ($_POST['D_0_14']);
        $D_15_64 = ($_POST['D_15_64']);
        $D_65 = ($_POST['D_65']);

        $consulta= "INSERT INTO poblacio_de_catalunya2 (Any, Codi, PoblacioNom, H_0_14, H_15_64, H_65, D_0_14, D_15_64, D_65)
    VALUES ('$any', '$codigo' , '$poblacioNom' , '$H_0_14' , '$H_15_64' ,'$H_65' , '$D_0_14' , '$D_15_64' , '$D_65')";

        mysqli_query($conexion, $consulta);
        mysqli_close($conexion);

    //     echo "<h3>Se ha insertado el siguiente registro: </h3>
    // <p>Año : $any.</p>
   
    // ";
    

    header('Location:index.php');
  }
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Registro</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</head>
<body>
<body id="page-top">


<form  action="nuevoregistro.php" method="POST">
<div id="login" >
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                    
                            <br>
                            <br>
                            <h3 class="text-center">Nuevo Registro</h3>
                            <div class="form-group">
                            <label for="Any" class="form-label">Año</label>
                            <input type="number"  id="Any" name="Any" class="form-control"placeholder="aaaa">
                            </div>
                            <div class="form-group">
                            <label for="Codigo" class="form-label">Código</label>
                            <input type="number"  id="Codigo" name="Codi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre de la Población:</label><br>
                                <input type="text" name="PoblacioNom" id="PoblacioNom" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="H_0_14">Hombres de 0 a 14 años:</label><br>
                                <input type="number" name="H_0_14" id="H_0_14" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="H_15_64">Hombres de 15 a 64 años:</label><br>
                                <input type="number" name="H_15_64" id="H_15_64" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="H_65">Hombres de 65 años:</label><br>
                                <input type="number" name="H_65" id="H_65" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="D_0_14">Damas de 0 a 14 años:</label><br>
                                <input type="number" name="D_0_14" id="D_0_14" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="D_15_64">Damas de 15 a 64 años:</label><br>
                                <input type="number" name="D_15_64" id="D_15_64" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="D_65">Damas de 65 años:</label><br>
                                <input type="number" name="D_65" id="D_65" class="form-control" placeholder="">
                            </div>
                     
                           <br>

                                <div class="mb-3 botones">
                                    
                               <input type="submit" value="Guardar"class="botones boton-guardar-volver " 
                               name="registrar"> <br>
                               <a href="index.php"  class ="botones boton-guardar-volver">VOLVER</a>
                               
                            </div>
                            </div>
                            </div>

</body>
</html>