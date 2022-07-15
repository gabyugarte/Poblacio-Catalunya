<?php 
// Sector de Paginación --------------------------------------------------------

//Operacion matematica para botón siguiente y atrás 

$IncrimentNum = (($compag +1)<=$TotalRegistro)?($compag +1):1;
$DecrementNun = (($compag -1))<1?1:($compag -1);
echo "<ul><li class=\"btn\"><a href=\"?pag=".$DecrementNun."\"> << </a></li>";
//Se resta y suma con el numero de pag actual con el cantidad de 
//números  a mostrar
$Desde=$compag-(ceil($CantidadMostrar/2)-1);
$Hasta=$compag+(ceil($CantidadMostrar/2)-1);
//Se valida
$Desde=($Desde<1)?1:$Desde;
$Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
//Se muestra los números de paginas

for ($i=$Desde; $i <=$Hasta ; $i++) { 
//Se valida la paginacion total
//de registros
if($i<=$TotalRegistro){
//Validamos la pag activo
    if($i==$compag){
        echo "<li class=\"active\" ><a href=\"?pag=".$i."\">".$i."</a></li>";
    }else{
        echo "<li><a href=\"?pag=".$i."\">".$i."</a></li>";
    }
}
}
echo "<li class=\"btn\"><a href=\"?pag=".$IncrimentNum."\">>></a></li></ul>";

?>