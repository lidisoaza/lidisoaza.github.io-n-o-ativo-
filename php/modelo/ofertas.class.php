<?php
 

class Ofertas{
	//Atributo
	private $idofertas;
	private $data_oferta;
	private $status_oferta;

       

    
	//Construtor
	public function __construct(){
	}//fecha construtor

	public function Ofertas(){
	}
	
	public function __get($a){
            return $this->$a;
	}	
	public function __set($a,$v){
            $this->$a = $v;
	}
        
        
        

        public function __toString(){
		return     '<br />ID Ofertas: '.$this->idofertas.
						   '<br />Data da Oferta: '.$this->data_oferta.
						   '<br />Status da Oferta: '.$this->status_oferta;
                           
        }//FECHA toString
		  	

}//fecha classe
?>
