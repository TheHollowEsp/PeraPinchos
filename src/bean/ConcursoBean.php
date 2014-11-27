<?php
class ConcursoBean {
	
	var $nombreConcurso;
	var $fechaInicio;
	var $fechaFin;
	var $basesConcurso;
	var $patrocinadores;
	var $premios;
	
	/* Constructor de clase*/	
	public function __construct() {
	}
	
	/* Obtener nombre concurso*/
	public function getNombreConcurso(){
		return $this->nombreConcurso;
	}
	
	/* Asignar nombre al concurso*/
	public function setNombreConcurso($nombreConcurso){
		$this->nombreConcurso = nombreConcurso;
	}
	
	/* Obtener fecha inicio*/
	public function getFechaInicio(){
		return $this->fechaInicio;
	}
	
	/* Asignar fecha de fin*/
	public function setFechaFin($fechaFin){
		$this->fechaFin = fechaFin;
	}
	
	/* Obtener fecha de fin*/
	public function getFechaFin(){
		return $this->fechaFin;
	}
	
	/* Asignar fecha de inicio*/
	public function setFechaInicio($fechaInicio){
		$this->fechaInicio = fechaInicio;
	}
	
	/* Obtener bases de concurso*/
	public function getBasesConcurso(){
		return $this->basesConcurso;
	}
	
	/* Asignar bases de concurso*/
	public function setBasesConcurso($basesConcurso){
		$this->basesConcurso = basesConcurso;
	}
	
	/* Obtener patrocinadores*/
	public function getPatrocinadores(){
		return $this->patrocinadores;
	}
	
	/* Asignar patrocinadores*/
	public function setPatrocinadores($patrocinadores){
		$this->patrocinadores = patrocinadores;
	}
	
	/* Obtener premios*/
	public function getPremios(){
		return $this->premios;
	}
	
	/* Asignar premios*/
	public function setPremios($premios){
		$this->premios = premios;
	}
	
	public function toString() {
		
		return "ConcursoBean:Nombre Concurso = ".$this->nombreConcurso.",
				Fecha Fin = ".$this->fechaFin.",
				Fecha inicio = ".$this->fechaFin.",
				Bases del concurso = ".$this->basesConcurso.",
				Patrocinadores = ".$this->patrocinadores.",
				Premios = ".$this->premios;
	}
	
}
?>