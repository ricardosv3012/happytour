<?php
	
	class ConnectionEntity {
		
		//переменные соединения
		private $aDataBaseName;
		private $aServer;
		private $aPort;
		private $aUser;
		private $aPass;
		
		
		function ConnectionEntity(){
			
			//инициализировать переменные
			$this->aDataBaseName = 0;
			$this->aServer       = 0;
			$this->aPort         = 0;
			$this->aUser         = 0;
			$this->aPass         = 0;
			
		}
		

		//GET - SET
		public function getDataBaseName(){
			
			return $this->aDataBaseName;
			
		}
		
		public function setDataBaseName($pValor){
				
			 $this->aDataBaseName = $pValor;
				
		}
		
		public function getServer(){
				
			return $this->aServer; 
				
		}
		
		public function setServer($pValor){
		
			$this->aServer = $pValor;
		}
		
		public function getPort(){
				
			return $this->aPort;
				
		}
		
		public function setPort($pValor){
		
			$this->aPort = $pValor;
		
		}
		
		public function getUser(){
				
			return $this->aUser; 
				
		}
		
		public function setUser($pValor){
		
			$this->aUser = $pValor;;
		
		}
		
		public function getPass(){
				
			return $this->aPass; 
				
		}
		
		public function setPass($pValor){
		
			$this->aPass = $pValor;
		
		}
		
	}


?>