<?php
$frase = "has debugao ya";
$porciones = explode(" ", $frase);

function gettamano($porciones):int {
    $tamano=0;
foreach ($porciones as $porcion) {
    if ($tamano < strlen($porcion)) {
        $tamano = strlen($porcion);
    }
}
return $tamano ;
}

$tamano = gettamano($porciones);

for ($i = 0; $i < $tamano + 3; $i++) {
    echo "#";
}
echo "<br>";



foreach ($porciones as $porcion) {
    echo "# " . $porcion;
if(strlen($porcion)!=$tamano){
    $espacios = $tamano - strlen($porcion);
    for ($x = 0; $x < $espacios; $x++) {
        echo "..";
    }
}
    echo " #"."<br>";
}


for ($i = 0; $i < $tamano + 3; $i++) {
    echo "#";
}
echo "<br>";


?>
