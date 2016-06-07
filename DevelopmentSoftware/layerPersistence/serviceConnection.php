<?php

	//показать ощибки
	error_reporting(E_ALL);	
	ini_set('display_errors', '1');
	
	include_once 'layerPersistence/connectionMysql.php';
	include_once 'layerPersistence/entityConnection.php';

	
	
	class ServiceMysql{
		
            private $aDBMySQL;   //connection mysql
            private $aEntyMySQL; //data connection
            private $aStreamSQL; //query
		
		
            public function ServiceMysql(){

                    $this->aDBMySQL   = new  DBMysql();
                    $this->aEntyMySQL = new  ConnectionEntity();

                    //PENDIENTE carda ruta config

            } 
		
		
	    public function SetUserMySql(){
	    	
	    	//Set csys01onnection
	    	$this->aEntyMySQL->setServer("localhost");
	    	$this->aEntyMySQL->setUser("omicron");
	    	$this->aEntyMySQL->setPass("omicron");
	    	$this->aEntyMySQL->setDataBaseName("omicron");
		$this->aEntyMySQL->setPort("3306");
	    
		     	    	
	    	$this->aDBMySQL->StartConnection( $this->aEntyMySQL );
	    	
	    }
	    
	    
	    //GET - SET
	    public function ExecuteMySQL($pStreamSQL){
	    	
                $this->aStreamSQL = $pStreamSQL;
                
	    	$result = $this->aDBMySQL->ExecuteSQL($this->aStreamSQL);
	    	
	    	return $result;
	    }
	    
            
        }
	
	
	
?>
