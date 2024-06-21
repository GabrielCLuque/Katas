<?php
/*Donada una expressió matemàtica de l'estil:

(3 + 4) * 2

o

(5 + 3) * (3 - 1)

Fes un programa que avaluï que els parells de parèntesis estàn correctament equilibrats en una expressió matemàtica.

Input

(3 + 4) * 2
(5 + 3) * (3 - 1)
(5 + 3 * (3 - 1)
Output

Correcte
Correcte
Incorrecte*/ 


//he encontrado este metodo en internet y aunque funciona no logro conseguir que no se vea el error
function shutDownFunction() { 
    $error = error_get_last();
    if ($error && ($error['type'] == E_PARSE)) {
        echo 'Incorrecte';
    } 
    else{
        echo 'Correcte';
    }
}
register_shutdown_function('shutDownFunction');

include 'operacion.php';

?>