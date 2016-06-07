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
	$atxtTitle     = $_POST['txtTitle'];
	$aSmallContent = $_POST['txtSmallContent'] ;
        $aContent      = $_POST['txtContent'] ;
        $aImage        = $_SESSION['APP_FILE'];
        
     	$aStreamSQL = '';
            
        $aStreamSQL =   " insert into omicron.news( idprocess, title_en, smallcontent_en, content_en,image)".
                        " values(".
                        " '2' ,".
                        " '".$atxtTitle."' ,".
                        " '".$aSmallContent."' ,".
                        " '".$aContent."', ".
                        " '".$aImage."' ".
                        ");";
                        
        //echo $aStreamSQL;
         
        
      
                        
        //EXECUTE QUERY
        $result = $aDBService->ExecuteMySQL($aStreamSQL);
        
        header("location:adminNews.php");
       
	

       

	
 ?>