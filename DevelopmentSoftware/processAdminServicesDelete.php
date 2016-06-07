<?php 
	//creamos la sesion
	session_start();

	//показать ощибки
	error_reporting(E_ALL);	
	ini_set('display_errors', '1');


	include 'layerPersistence/serviceConnection.php';
	
        $aDBService;
        $aStreamSQL;
        $aStreamResult;
		
        
           
        //start conection
        $aDBService = new ServiceMysql();
        $aDBService->SetUserMySql();
	
	//информация	
	$idServices = $_POST['idServices'];
        
     	$aStreamSQL = '';
            
        $aStreamSQL =   " delete from omicron.services".
                        " where idservices= ".$idServices;
                        
                        
        //EXECUTE QUERY
        $result = $aDBService->ExecuteMySQL($aStreamSQL);
        
        header("location:adminServices.php");
       
	

       

	
 ?>