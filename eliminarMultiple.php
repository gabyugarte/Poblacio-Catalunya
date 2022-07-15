<?php
require 'includes/conn.php';
//Eliminar- multiple--------------------------------------------------------
if(isset($_POST['eliminar-multiple'])){
    $todo_id= $_POST['eliminar-id'];
    $extract_id= implode(',',$todo_id);
    // echo $extract_id;

    $query = "DELETE FROM poblacio_de_catalunya2 WHERE id IN($extract_id)";
    $query_run = mysqli_query($conexion,$query);

    if($query_run){
        echo"Data deleted successfully";
        header("Location: index.php");
    }
    else{
        echo"Data not deleted successfully";
        header("Location: index.php");
    }
}

