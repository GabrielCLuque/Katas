<?php 
//KATA HECHA CON ARRAYS YA QUE QUERIA PRACTICARLOS


//he dividio la informacion en calendario, planes y entregas


//primero poblamos el calendario con todos los dias, todos empiezan en false indicando que de momento estan libres
$calendario=[];
for($x = 0; $x<=29; $x++){

    array_push($calendario,[$x+1,6,false]);
  
}


for($x = 0; $x<=30; $x++){

    array_push($calendario,[$x+1,7,false]);
}

echo "<br>";

for($x = 0; $x<=30; $x++){

    array_push($calendario,[$x+1,8,false]);
}


 $plans=[];
$entregas=[];


//las funciones añadir modifican el estado del calendario y llenan su respectivo array con la informacion del plan/entrega
function añadirentrega(array &$calendario, Array &$entregas,string $nombre,string $sprint ,string $fecha, string $link, string $comentarios
):array{

    $entregas=[[$nombre, $sprint,$fecha, $link, $comentarios, "PENDIENTE"]];

    foreach($entregas as $entrega){
      
        $fechaxploted1 = explode("/",$entrega[2]);
        $dia = (int)$fechaxploted1[0];
        $mes =(int)$fechaxploted1[1];
              
            foreach($calendario as &$fecha){
                    if($fecha[0]==$dia && $fecha[1]== $mes){
                        if ( $fecha[2]==true){
                            echo "No se puede actualizar , hay dos fechas que coinciden el dia" .$dia . "/" .$mes;
                        }
                        else{
                        $fecha[2]=true;}
                    }
                }
    }
return $calendario;

}

//la funcion entregar cambia el estado de una entrega pendiente a entregada
function entregar(Array &$entregas, string $nombre):array{
$done = false;
    foreach($entregas as &$entrega){
      if ($entrega[0]== $nombre){
        if($entrega[5] =="ENTREGADO"   || $entrega[5]=="EENTREGADO"){
            echo "Esta tarea ya esta entregada";return $entregas;  
        }
        $entrega[5] ="ENTREGADO";
        $done = true;
       
      }    
    }

    if ($done == false ){
       echo  "No se a encontrado ninguna entrega con el nombre:" . $nombre;  return $entregas;   

    }
    else{echo "Tarea entregada";return $entregas;}
    
}

//la funcion reentregar cambia el estado de la tarea a reentregada
function REentregar(Array &$entregas, string $nombre):array{
    $done = false;
        foreach($entregas as &$entrega){
          if ($entrega[0]== $nombre){
            $entrega[5] ="REENTREGADO";
            $done = true;
           
          }    
        }
    
        if ($done == false ){
           echo  "No se a encontrado ninguna entrega con el nombre:" . $nombre;  return $entregas;   
    
        }
        else{echo "Tarea reentregada";return $entregas;}
        
    }

function añadirplan(array &$calendario, Array &$plans, string $nombre, string $lugar,string $fecha, string $tipo):array{

    $plans=[[ $nombre, $lugar, $fecha, $tipo,true]];

    foreach($plans as $pla){
      
        $fechaxploted1 = explode("/",$pla[2]);
        $dia = (int)$fechaxploted1[0];
        $mes =(int)$fechaxploted1[1];
              
            foreach($calendario as &$fecha){
                    if($fecha[0]==$dia && $fecha[1]== $mes){
                        if ( $fecha[2]==true){
                            echo "No se puede actualizar , hay dos fechas que coinciden el dia" .$dia . "/" .$mes;
                        }
                        else{
                        $fecha[2]=true;}
                    }
                }
    }
return $calendario;
}

//la funcion cancelar cancela el estado del plan y modifica el calendario para que ya no se muestre ocupado
function cancelarplan(Array &$plans, &$calendario ,$nombre):array{
    $done = false;
        foreach($plans as &$pla){
          if ($pla[0]== $nombre){
            if ($pla[4]==false){echo "el plan ya se encuentra cancelado";return $plans ;}

            else{
            $pla[4] =false;
            $done = true;
            }
          }    
          
        }
    
        if ($done == false ){
           echo  "No se a encontrado ningun plan con el nombre:" . $nombre;  return $plans;   
    
        }
        else{echo "Plan cancelado";return $plans;}

        if ($done == true){
            foreach($plans as $pla){
      
                $fechaxploted1 = explode("/",$pla[2]);
                $dia = (int)$fechaxploted1[0];
                $mes =(int)$fechaxploted1[1];
                      
                    foreach($calendario as &$fecha){
                            if($fecha[0]==$dia && $fecha[1]== $mes){
                                $fecha[2]=false;}
                            }
                        }
        }
        
    }

//funciones para mostrar el calendario con los dias ocupados y libres, los planes y la entregas
function mostrarcalendario(array &$calendario){

foreach ($calendario as $index => $dia) {
    $dia_numero = $dia[0]; // Día
    $mes = $dia[1]; // Mes
    $estado = $dia[2] ; // Estado (booleano como texto)

    echo "Día: $dia_numero, Mes: $mes, Estado:";
    if ($estado =='true'){ echo "Ocupado" . "<br>";}
    else {  echo " Sin plan". "<br>";}

}}

function mostrarPlanes(array $plans): void {

  
    foreach ($plans as $plan) {
        $estado = $plan[4] ? "vigente" : "cancelado";
        echo "El plan '{$plan[0]}' en '{$plan[1]}' para el día {$plan[2]} esta {$estado}.\n";
        echo "<br>";
    }
}
function mostrarEntregas(array $entregas): void {

    foreach ($entregas as $entrega) {
        echo "Entrega: '{$entrega[0]}'\n";
        echo "Sprint: {$entrega[1]}\n";
        echo "Fecha: {$entrega[2]}\n";
        echo "Link: {$entrega[3]}\n";
        echo "Comentarios: {$entrega[4]}\n";
        echo "Estado: {$entrega[5]}\n";
        echo "<br>";
    }
}


//
añadirplan($calendario,$plans ,"japon","Japon", "12/6" , "Cultural");
añadirentrega($calendario,$entregas,"Api","5", "24/8" ,"github/myapi.com", "Muy dificl");
mostrarcalendario($calendario);

entregar($entregas,"Api");

REentregar($entregas,"Api");var_dump($entregas);
echo "<br>";

cancelarplan($plans,$calendario, "japon");
var_dump($plans);

mostrarPlanes($plans);
mostrarEntregas($entregas);
mostrarcalendario($calendario);