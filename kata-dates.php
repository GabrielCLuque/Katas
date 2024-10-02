<?php 
$fecha1 = "12/01/2000";
$fecha2 = "30/11/2555";

//Primero un explode para sacar las fechas

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

//array con los dias de cada mes 
$diasmeses=[
31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

$mesesdif = $mesesdif * 31;
function sumarbienlosmeses($mesesdif, $meses1, $meses2, array $diasmeses): int {
 
    if ($meses1 > $meses2) {
        $difmesaño = $meses1;
        $meses1 = $meses2;
        $meses2 = $difmesaño;
    }

    for ($x = $meses1 - 1; $x < $meses2; $x++) {
        if ($diasmeses[$x] !== 31) {
            $mesesdif += $diasmeses[$x] - 31;
        }
    }
    return $mesesdif;
}

$añosdif = $añosdif * 365;

//if complicado con las reglas que determinan si es bisiesto
function esBisiesto($year) {
    if ($year % 4 == 0) {
        if ($year % 100 == 0) {
            if ($year % 400 == 0) {
                return true; 
            } else {
                return false; 
            }
        } else {
            return true;
        }
    } else {
        return false; 
    }
}

// Funcion para ver dias bisiestos a tener en cuenta
function contarAniosBisiestos($inicio, $fin) {
    $bisiestos = 0;
    for ($year = $inicio; $year <= $fin; $year++) {
        if (esBisiesto($year)) {
            $bisiestos++;
        }
    }
    return $bisiestos;
}

if ($dias1 >31 || $dias2 >31 || $meses1 >12 || $meses2 >12 ){
    echo "formato de fecha incorrecto";
}

else{
echo "la diferencia es de " . $diasdif + sumarbienlosmeses($mesesdif,$meses1,$meses2, $diasmeses)+$añosdif 
+contarAniosBisiestos($años1, $años2) +1 ." dias";
//sumo 1 al final, por alguna razon todos los resultados tienen un dia menos 
}




?>
