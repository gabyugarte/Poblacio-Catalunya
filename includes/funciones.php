<?php
   
include 'conn.php';


if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

            case 'eliminar_registro';
            eliminar_registro();
    
            break;

            // case 'acceso_user';
            // acceso_user();
            // break;


		}

	}



    function editar_registro() {
      
   
        $conexion=mysqli_connect("localhost", "root", "", "2poblacio_de_catalunya");
        extract($_POST);
        $consulta=" UPDATE `poblacio_de_catalunya2` SET `Any`='$Any',`Codi`='$Codi',`PoblacioNom`='$PoblacioNom',`H_0_14`='$H_0_14',`H_15_64`='$H_15_64',`H_65`='$H_65',`D_0_14`='$D_0_14',`D_15_64`='$D_15_64',`D_65`='$D_65' WHERE
        `id` = $id";

        mysqli_query($conexion, $consulta);
        header('Location:../index.php');
    }
        function  eliminar_registro(){
    
                $conexion=mysqli_connect("localhost","root","","2poblacio_de_catalunya");
                extract($_POST);
                $id = $_POST["id"];
                $consulta=" DELETE FROM poblacio_de_catalunya2 WHERE id = '$id' "; 
                
        
                mysqli_query($conexion, $consulta);
        
		header('Location:../index.php');

}