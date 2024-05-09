<?php
function miAutoload($claseDesconocida){
    $doc = "clases/{$claseDesconocida}.php";
    if(file_exists($doc)){
        require_once $doc;
    }
}
spl_autoload_register("miAutoload");
?>