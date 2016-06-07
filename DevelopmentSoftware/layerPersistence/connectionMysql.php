<?php
	
	//показать ощибки
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	include 'layerPersistence/entityConnection.php';
	
	class DBMysql{
		
		//переменные соединения
		private $dbMySQL;
		
		function DBMysql(){
				
		}
		
		
		function StartConnection($aConectEntity){
			
			$this->dbMySQL = mysqli_connect($aConectEntity->getServer(),
							$aConectEntity->getUser(), 
							$aConectEntity->getPass(), 
							$aConectEntity->getDataBaseName(), 
							$aConectEntity->getPort() );
			
			if (mysqli_connect_errno()){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
						
		}
		
		
		function ExecuteSQL($pStatement){
			
			//echo $pStatement;
			$result = mysqli_query($this->dbMySQL ,$pStatement);
			return $result;
					
				
		}
		
		
	}


?>
