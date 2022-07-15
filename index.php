<?php
include 'includes/conn.php';
    
    $poblacion = "SELECT DISTINCT PoblacioNom FROM poblacio_de_catalunya2";
    $resultPoblacion = mysqli_query($conexion,$poblacion);

    $any = "SELECT DISTINCT Any FROM poblacio_de_catalunya2" ;
    $resultAny =  mysqli_query($conexion,$any);
 
   
// Filtro para Población--------------------------------------------------------
    $pob='';
    if(isset($_POST['PoblacioNom'])){
        if($_POST['PoblacioNom']!== '0'){
            $pob = "PoblacioNom = '".$_POST['PoblacioNom']."'";
        //  echo 'poblacio escogida es ' . $pob;
        }
    }

// Filtro para Año--------------------------------------------------------
    $pobAny ='';
    if(isset($_POST['Any'])){
        if($_POST['Any']!== '0'){
            $pobAny = "Any = '".$_POST['Any']."'";
        //  echo 'Año es ' . $pob;
        }
    }

// Filtro buscar Provincias JOIN--------------------------------------------------------
    // $where ='';
    // if(!empty($_POST)){
    //     $valor = $_POST['campo'];
    //     if (!empty($valor)) {
    //         $where = "WHERE "
    //     }
    // }




//Realizamos la consulta y concatenamos-------------------
$CantidadMostrar=10;
$compag = (int)(!isset($_GET['pag'])) ? 1 : $_GET['pag'];
$query= "SELECT * FROM poblacio_de_catalunya2"; 
$TotalReg =$conexion->query($query);
//Se divide la cantidad de registro de la BD con la cantidad a mostrar
$TotalRegistro = ceil($TotalReg->num_rows/$CantidadMostrar);
// echo "<b>La cantidad de registro se dividió a: </b>". $TotalRegistro;



if (isset($_POST['PoblacioNom']) && (isset($_POST['Any']))) {
    if ((($_POST['PoblacioNom']) !== '0') && (($_POST['Any']) !== '0')) {
        $query= "SELECT * FROM poblacio_de_catalunya2 " . " WHERE " . $pob . " AND " . $pobAny;
    } elseif (($_POST['PoblacioNom']) !== '0') {
        $query= "SELECT * FROM poblacio_de_catalunya2 " . " WHERE " . $pob;
    } elseif (($_POST['Any'])!== '0') {
        $query= "SELECT * FROM poblacio_de_catalunya2 " . " WHERE " . $pobAny;
    }
}
// echo $query;





    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Població de Catalunya</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- CSS only -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<section class="consults">
    <h1>Població Catalunya</h1>
    
        <form method="post" action="index.php">
            <div class="filtros">
            <!-- población -->
                <label for="PoblacioNom">Nombre de la Poblacion</label>
                    <select name="PoblacioNom">
                        <option value="0" name="PoblacioNom">Seleccionar</option>
                    <?php 
                        while ( $valores = mysqli_fetch_array($resultPoblacion)){ 
                            echo'<option value="'.$valores['PoblacioNom'].'">'.$valores['PoblacioNom'].'</option>';
                        }          
                    ?>
                    </select> <br><br>

    
            <!-- año -->
                <label for="Codi">Año</label>
                        <select name="Any">
                            <option value="0" name="Any">Seleccionar</option>
                            <?php 
                            while ($valores = mysqli_fetch_array($resultAny)) {
                                echo'<option value="'.$valores['Any'].'">'.$valores['Any'].'</option>';
                            }
                            ?>
                        </select> <br>
                        <div class="botones">
                            <input type="submit" value="CONSULTA DATOS" class="boton"> <br>
                            <a href="nuevoregistro.php"  class ="boton">NUEVO REGISTRO</a>
                            <br><br>
                        </div>
                
                <!-- <label for="buscarNombre">Provincias</label>
                    <input type="text" id="campo" name="campo" /><br><br>
                    <input type="submit" id="enviar" name="enviar" value="Buscar" class="boton" />
                    <br> -->
            </div>
        
        </form>
     
        
            <br>
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
                $query2= $query . " LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar; 
                $resultsPoblacionNombre = mysqli_query($conexion,$query2);
                while ($row = mysqli_fetch_assoc($resultsPoblacionNombre)){
                //variable para saber el número de resultados encontrados
                $numeroSql = mysqli_num_rows($TotalReg);?>

                <div class="table-item"><?= $row['Any'] ?> </div>
                <div class="table-item"><?= $row['Codi'] ?> </div>
                <div class="table-item"><a href= "filtroPorPoblacion.php?id=<?= $row['id'] ?>"><?= $row['PoblacioNom'] ?> </a></div>
                <div class="table-item"><?= $row['H_0_14'] ?> </div>
                <div class="table-item"><?= $row['H_15_64'] ?> </div>
                <div class="table-item"><?= $row['H_65'] ?> </div>
                <div class="table-item"><?= $row['D_0_14'] ?> </div>
                <div class="table-item"><?= $row['D_15_64'] ?> </div>
                <div class="table-item"><?= $row['D_65'] ?> </div>
                <div class="table-item">
                   
                    <a class="boton-editar-eliminar" href="editar.php?id=<?php echo $row['id']?> ">Editar
                    </a><br><br>
                    <a class="boton-editar-eliminar"  href="eliminar.php?id=<?php echo $row['id']?>">Eliminar
                    </a> 
                    
                </div>
                <!-- checkbox -->
                <div class="table-item">
                    <input type="checkbox" name="eliminar-id[]" value="<?= $row['id'] ?>"/><br>
                    <!-- <input type="hidden" name="id" value="<?= $row['id'] ?>"/><br> -->
                </div>
                   
                <?php } mysqli_free_result($resultsPoblacionNombre);?>
            
            </div>
            </form>
       
    <!-- <div class="container my-5">
   -->

    <!-- </div> -->
    <p style="font-weight: bold; color: purple;"><i class="mdi mdi-file-document"></i> <?php echo $numeroSql; ?>Resultados Encontrados</p>
<?php include 'paginacion.php'; ?>
</body>
</html>
