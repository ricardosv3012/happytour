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
	$idUsers = $_POST['idUsers'];
        
     	$aStreamSQL = '';
        
        $aStreamSQL =   " delete from omicron.users".
                        " where idUsers= ".$idUsers;
        
        
//        $aStreamSQL =   " delete from omicron.news".
//                        " where idnews= ".$idNews;
                        
                        
        //EXECUTE QUERY
        $result = $aDBService->ExecuteMySQL($aStreamSQL);
        
        header("location:adminUsers.php");
        //header("location:adminNews.php");
       
	

       

	
 ?>