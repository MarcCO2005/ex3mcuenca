<?php  
require_once "autoloader.php";
$connection = new Connection;
$lighting = new Lighting();
$tareas= $lighting->getAllLamps();
if (isset($_GET['lamb_id'])){
    $id= $_GET['lamb_id'];
}else {
    $id = NULL;
}

foreach ($tareas as $tarea){
    if ($tarea->getLampId() == $id){
        if ($tarea['lamb_on'] == 1){
            $tarea['lamb_on'] =0;
        }else {
            $tarea['lamb_on'] = 1;
        }
    }
    header("location: index.php");
};
?>