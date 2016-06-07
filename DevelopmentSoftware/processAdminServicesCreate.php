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
	$aTitle   = $_POST['txtTitle'];
	$aContent = $_POST['txtContent'] ;
        $aIcon    = $_POST['txtIcon'] ;
        
        
     	$aStreamSQL = '';
            
        $aStreamSQL =   " insert into omicron.services(idprocess, title_en,".
                        " content_en,icon) ".
                        " values(1,".
                        " '".$aTitle."' ,".
                        " '".$aContent."' ,".
                        " '".$aIcon."' ".
                        ");";
                        
        
        
        //echo $aStreamSQL;
         
        //echo $_SESSION['APP_FILE'];
      
                        
        //EXECUTE QUERY
        $result = $aDBService->ExecuteMySQL($aStreamSQL);
        
        header("location:adminServices.php");
       
	

       

	
 ?>