<?php
$frase = "has debugao ya";
$porciones = explode(" ", $frase);
$alm=array();
$tamano = 0;

foreach($porciones as $porcion){
if ($tamano <= strlen($porcion)){
    $tamano =  strlen($porcion);
}
}

 
 for ($i=0; $i<$tamano+4; $i++){
    echo  "#";
 }


 echo "</br>";

 
 $espacios=0;

foreach($porciones as $porcion){
echo  "# " . $porcion;
$espacios = strlen($porcion) - $tamano;
if(strlen($porcion) <= $tamano){
    for ($i = 0; $i <= $espacios; $i++){
        echo " ";
    }
    echo " #". "</br>";
}

}

for ($i=0; $i<$tamano+4; $i++){
    echo  "#";
 }
 

?>