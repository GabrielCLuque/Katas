<?php
/*
 Crea una funció que calculi i retorni quants dies hi ha entre dues cadenes de text donades:
La cadena de text que representa una data té el format "dd/mm/yyyy"
La diferència entre dies serà absoluta(no importa l'ordre de les dates)
Si alguna de les dates donades no respecta el format de data donat, s'ha de mostrar un error.
 */

$fecha1 = "11/31/2345";
$fecha2 = "11/31/2555";

$fechaxploted1 = explode("/",$fecha1);
$dias1 = intval($fechaxploted1[0]);
$meses1 = intval($fechaxploted1[1]);
$años1 = intval($fechaxploted1[2]);

$fechaxploted2 = explode("/",$fecha2);
$dias2 = intval($fechaxploted2[0]);
$meses2 = intval($fechaxploted2[1]);
$años2 = intval($fechaxploted2[2]);

$diasdif = abs($dias1 -$dias2);
$mesesdif = abs($meses1 - $meses2);
$añosdif = abs($años1 - $años2);

if ($dias1 >12 || $dias2 >12 || $meses1 >31 || $meses2 >31 ){
    echo "formato de fecha incorrecto";
}
else{
echo "la diferencia es de " . $diasdif + $mesesdif * 30 +$añosdif + 365 ." dias";
}
?>