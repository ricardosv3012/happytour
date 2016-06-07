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
	$aidUsers   = $_POST['txtId'];
        $aFirstName = $_POST['txtFirstName'];
        $aLastName  = $_POST['txtLastName'];
        $aLogin     = $_POST['txtLogin'];
        $aPass      = $_POST['txtPass'];
        $aPhone     = $_POST['txtPhone'];
        $aMail      = $_POST['txtMail'];
                
     	$aStreamSQL = '';
        
        $aStreamSQL =   " update omicron.users".
                        " set firtname ='".$aFirstName."',".
                        " lastname ='".$aLastName."',".
                        " login ='".$aLogin."',".
                        " password ='".$aPass."',".
                        " numberphone = '".$aPhone."',".
                        " email = '".$aMail."'".
                        " where idusers =".$aidUsers;
        
                
        //echo $aStreamSQL;

                        
                        
        //EXECUTE QUERY
        $result = $aDBService->ExecuteMySQL($aStreamSQL);
        
        header("location:adminUsers.php");
        
       
	

       

	
 ?>