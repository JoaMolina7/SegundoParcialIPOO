<?php
/** Por otro lado, si se trata de un partido de basquetbol  se almacena la cantidad de infracciones de manera tal que al coeficiente
 *  base se debe restar un coeficiente de penalización, cuyo valor por defecto es: 0.75, * (por) la cantidad de infracciones. 
 * Es decir:
coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones);
     */
class PartidoBasquet extends Partido{
    private $coefBase; 
    private $coefPenalizacion;
    private $cantInfracciones;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $cantInfracciones){
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->coefPenalizacion = 0.75;
        $this->cantInfracciones = $cantInfracciones;
        $this->coefBase = 0.5;
        
    }

    //Getters
    public function getCantInfracciones(){
        return $this->cantInfracciones;
    }

    public function getCoefPenalizacion(){
        return $this->coefPenalizacion;
    }

    public function getCoefBase(){
        return $this->coefBase;
    }

    //Setters
    public function setCantInfracciones($newCantInfracciones){
        $this->cantInfracciones = $newCantInfracciones;
    }

    public function setCoefPenalizacion($newCoefPenalizacion){
        $this->coefPenalizacion = $newCoefPenalizacion;
    }

    public function setCoefBase($newCoefBase){
        $this->coefBase = $newCoefBase;
    }

    public function __toString(){
        $partido = parent::__toString();
        return $partido . "Coeficientes: \n" ."Base: ". $this->coefBase ."\nPenalizacion: ". $this->coefPenalizacion ."\nCantInfracciones: ". $this->cantInfracciones . "\n";
    }

    public function coeficientePartido(){
        $coeficiente = parent::coeficientePartido();
        $coeficiente = $coeficiente - ($this->coefPenalizacion * $this->cantInfracciones);
        return $coeficiente;
    }


    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
?>