<?php
/** Implementar la clase Torneo que contiene la colección de partidos y un importe que será parte del premio. 
 * Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía.     */
class Torneo{
    private $colObjPartidos;
    private $importePartePremio;

    public function __construct($colObjPartidos, $importePartePremio){
        $this->colObjPartidos = $colObjPartidos ? $colObjPartidos : [];
        $this->importePartePremio = $importePartePremio;
    }

    //Getters
    public function getColObjPartidos(){
        return $this->colObjPartidos;
    }

    public function getImportePartePremio(){
        return $this->importePartePremio;
    }

    //Setters 
    public function setColObjPartidos($newColObjPartidos){
        $this->colObjPartidos = $newColObjPartidos;
    }

    public function setImportePartePremio($newImportePartePremio){
        $this->importePartePremio = $newImportePartePremio;
    }

    /**Método auxiliar para mostrar arrays de objetos en el método __toString */
    protected function leerColObj($arrayDeObjetos){
        $cadena = "";
            foreach($arrayDeObjetos as $objAnalizado){
                $cadena = $cadena . $objAnalizado ."\n";
            }
        return $cadena;
    }
    public function __toString(){
        $partidos = $this->leerColObj($this->getColObjPartidos());
        return "Torneo: \n" ."Partidos: \n". $partidos ."\nImporte de parte del premio: ". $this->getImportePartePremio() ."\n";
    }

    
    /**Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) 
     * en la  clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará el partido y si se 
     * trata de un partido de futbol o basquetbol . El método debe crear y retornar la instancia de la clase 
     * Partido que corresponda y almacenarla en la colección de partidos del Torneo. Se debe chequear que
     *  los 2 equipos tengan la misma categoría e igual cantidad de jugadores, caso contrario no podrá ser 
     * registrado ese partido en el torneo.   */
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
        $partido = null;
        $colObjPartidos = $this->getColObjPartidos();
        $idPartido = count($colObjPartidos) + 1;
            if($OBJEquipo1->getObjCategoria()->getDescripcion() == $OBJEquipo2->getObjCategoria()->getDescripcion() && $OBJEquipo1->getCantJugadores() == $OBJEquipo2->getCantJugadores() && $OBJEquipo1 != $OBJEquipo2){

                if($tipoPartido == "futbol"){
                    $partido = new PartidoFutbol($idPartido, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0);
                }
                else if($tipoPartido == "basquetbol"){
                    $partido = new PartidoBasquet($idPartido, $fecha, $OBJEquipo1, 0, $OBJEquipo2, 0, 0);
                }
                array_push($colObjPartidos, $partido);
                $this->setColObjPartidos($colObjPartidos); 
            }
        return $partido;
    }
    
    /**Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se 
     * trata de un partido de fútbol o de básquetbol y en  base  al parámetro busca entre esos partidos 
     * los equipos ganadores ( equipo con mayor cantidad de goles). El método retorna una colección con los
     *  objetos de los equipos encontrados */
    public function darGanadores($deporte){
        $ganadores = [];
            if($deporte == "futbol"){
                foreach($this->getColObjPartidos() as $partido){
                    if($partido instanceof PartidoFutbol){
                        array_push($ganadores, $partido->darEquipoGanador()); 
                    }
                }
            }
            else if($deporte == "basquetbol"){
                foreach($this->getColObjPartidos() as $partido){
                    if($partido instanceof PartidoBasquet){
                        array_push($ganadores, $partido->darEquipoGanador()); 
                    }
                }
            }
        return $ganadores;
    }

    /**Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo
     *  asociativo donde una de sus claves es ‘equipoGanador’  y contiene la referencia al equipo ganador;
     *  y la otra clave es ‘premioPartido’ que contiene el valor obtenido del coeficiente del 
     * Partido por el importe configurado para el torneo. 
    (premioPartido = Coef_partido * ImportePremio)*/
    public function calcularPremioPartido($OBJPartido){
        $premioPartido = null;
        if($OBJPartido !== null){
        $equipoGanador = $OBJPartido->darEquipoGanador();
        }
        if($OBJPartido !== null && is_Array($equipoGanador) == false){
                $premioPartido = ["equipoGanador" => $equipoGanador, "premioPartido" => $OBJPartido->coeficientePartido() * $this->getImportePartePremio()];
        }
                return $premioPartido;
    }
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>