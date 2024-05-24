<?php
/** En cada partido se gestiona un coeficiente base cuyo valor por defecto es 0.5  y es aplicado a la cantidad de goles y 
 * a la cantidad de jugadores de cada equipo. Es decir:
  coef =  0,5 * cantGoles * cantJugadores  donde cantGoles : es la cantidad de goles;   cantJugadores : es la cantidad de jugadores.

Si se trata de un partido de fútbol, se deben gestionar el valor de 3 coeficientes que serán aplicados según la categoría del partido (coef_Menores,coef_juveniles,coef_Mayores) .  A continuación se presenta una tabla en la que se detalla los valores por defecto de cada  coeficiente aplicado a una categoría de un partido  fútbol: 

Categoría de los equipos
Coef_Menores 0,13
Coef_juveniles 0,19
Coef_Mayores 0,27*/
class PartidoFutbol extends Partido{
    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coefMenores = 0.13;
        $this->coefJuveniles = 0.19;
        $this->coefMayores = 0.27;
    }
    
    //Getters 
    public function getCoefMenores(){
        return $this->coefMenores;
    }

    public function getCoefJuveniles(){
        return $this->coefJuveniles;
    }

    public function getCoefMayores(){
        return $this->coefMayores;
    }

    //Setters
    public function setCoefMenores($newCoefMenores){
        $this->coefMenores = $newCoefMenores;
    }

    public function setCoefJuveniles($newCoefJuveniles){
        $this->coefJuveniles = $newCoefJuveniles;
    }

    public function setCoefMayores($newCoefMayores){
        $this->coefMayores = $newCoefMayores;
    }

    public function __toString(){
        $partido = parent::__toString();
        return $partido . "Coeficientes: \n" ."Menores: ". $this->coefMenores ."\nJuveniles: ". $this->coefJuveniles ."\nMayores: ". $this->coefMayores . "\n";
    }
    
    /**Si se trata de un partido de fútbol, se deben gestionar el valor de 3 coeficientes que serán aplicados según la
     *  categoría del partido (coef_Menores,coef_juveniles,coef_Mayores) .  A continuación se presenta una tabla 
     * en la que se detalla los valores por defecto de cada  coeficiente aplicado a una categoría de un partido  fútbol:  */
    public function coeficientePartido(){
        $coeficiente = parent::coeficientePartido();
            if($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == $this->getObjEquipo2()->getObjCategoria()->getDescripcion()){
                if($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == "Menores"){
                    $coeficiente = $coeficiente * $this->getCoefMenores();
                }else if($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == "Juveniles"){
                    $coeficiente = $coeficiente * $this->getCoefJuveniles();
                }else if($this->getObjEquipo1()->getObjCategoria()->getDescripcion() == "Mayores"){
                    $coeficiente = $coeficiente * $this->getCoefMayores();
                }
            }
        return $coeficiente;    
    }
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>