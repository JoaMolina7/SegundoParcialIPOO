<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("PartidoBasquet.php");
include_once("PartidoFutbol.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'Juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",2,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",3,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);

/**Crear un objeto de la clase Torneo donde el importe base del premio es de: 100.000.  */
$objTorneo = new Torneo(null, 100000);

/** */
$partidoBasquet1 = new PartidoBasquet(11,"2024-05-05", $objE7, 80, $objE8, 120, 7);
$partidoBasquet2 = new PartidoBasquet(12,"2024-05-06", $objE9, 81, $objE10, 110, 8);
$partidoBasquet3 = new PartidoBasquet(13,"2024-05-07",$objE11,115,$objE12,85,9);

$partidoFutbol1 = new PartidoFutbol(14,"2024-05-07",$objE1,3,$objE2,2);
$partidoFutbol2 = new PartidoFutbol(15,"2024-05-08",$objE3,0,$objE4,1);
$partidoFutbol3 = new PartidoFutbol(16,"2024-05-09",$objE5,2,$objE6,3);

/**Completar el script testTorneo.php para invocar al método : 
ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol'); visualizar la respuesta y la cantidad de equipos del torneo.
ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol') ; visualizar la respuesta y la cantidad de equipos del torneo.
ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol'); visualizar la respuesta y la cantidad de equipos del torneo.
darGanadores(‘basquet’) y visualizar el resultado.
darGanadores(‘futbol’) y visualizar el resultado.
calcularPremioPartido con cada uno de los partidos obtenidos en a,b,c.
Realizar un echo del objeto  Torneo creado en (1).
 */

 /**ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol'); visualizar la respuesta y la cantidad de equipos del torneo. */
 $partido = $objTorneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol');
 if($partido == null){
echo "No se pudo ingresar\n";
 }
 else{
    echo "Partido ingresado:\n". $partido ."\n";
 }

 /**ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol') ; visualizar la respuesta y la cantidad de equipos del torneo. */
 $partido2 = $objTorneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'basquetbol');
 if($partido2 == null){
echo "No se pudo ingresar\n";
 }
 else{
    echo "Partido ingresado:\n". $partido2 ."\n";
 }

 /**ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol'); visualizar la respuesta y la cantidad de equipos del torneo. */
 $partido3 = $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-25', 'basquetbol');
 if($partido3 == null){
echo "No se pudo ingresar\n";
 }
 else{
    echo "Partido ingresado:\n". $partido3 ."\n";
 }

 /**darGanadores(‘basquet’) y visualizar el resultado. */
$ganadoresBasquet = $objTorneo->darGanadores('basquetbol');
if(count($ganadoresBasquet) > 0){
    foreach($ganadoresBasquet as $equipo){
        if(is_array($equipo)){
            echo "\nLos equipos empataron, son los siguientes:\n";
            foreach($equipo as $equipoEmpatado){
                echo $equipoEmpatado ."\n";
            }
        }else{
            echo $equipo;
        }
      
    }
}
else{
    echo "No hay ganadores\n";
}

/**darGanadores(‘futbol’) y visualizar el resultado. */
$ganadoresFutbol = $objTorneo->darGanadores('futbol');
if(count($ganadoresFutbol) > 0){
    foreach($ganadoresFutbol as $equipo){
        if(is_array($equipo)){
            echo "\nLos equipos empataron, son los siguientes:\n";
            foreach($equipo as $equipoEmpatado){
                echo $equipoEmpatado ."\n";
            }
        }else{
            echo $equipo;
        }
      
    }
   
}
else{
    echo "No hay ganadores\n";
}

/**calcularPremioPartido con cada uno de los partidos obtenidos en a,b,c. */
$premioPartido1 = $objTorneo->calcularPremioPartido($partido);
if($premioPartido1 == null){
    echo "No se pudo calcular el premio\n";
}else{
    echo "Equipo ganador: ". $premioPartido1["equipoGanador"] . " con un premio de: " . $premioPartido1["premioPartido"] . "\n";
}

/****************************************************************************** */
$premioPartido2 = $objTorneo->calcularPremioPartido($partido2);
if($premioPartido2 == null){
    echo "No se pudo calcular el premio\n";
}else{
    echo "Equipo ganador: ". $premioPartido2["equipoGanador"] . " con un premio de: " . $premioPartido2["premioPartido"] . "\n";
}

/****************************************************************************** */
$premioPartido3 = $objTorneo->calcularPremioPartido($partido3);
if($premioPartido3 == null){
    echo "No se pudo calcular el premio\n";
}else{
    echo "Equipo ganador: ". $premioPartido3["equipoGanador"] . " con un premio de: " . $premioPartido3["premioPartido"] . "\n";
}

echo $objTorneo;

?>
