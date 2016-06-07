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
	$aName     = $_POST['txtFirstName'];
	$aLastName = $_POST['txtLastName'] ;
        $aLogin    = $_POST['txtLogin'] ;
        $aPassWord = $_POST['txtPass'] ;
        $aPhone    = $_POST['txtPhone'] ;
        $aEmail    = $_POST['txtMail'] ;
        $aImage    = $_SESSION['APP_FILE'];
        
     	$aStreamSQL = '';
            
        $aStreamSQL =   " insert into omicron.users(  firtname, lastname,".
                        " login, password, numberphone, email,image) ".
                        " values(".
                        " '".$aName."' ,".
                        " '".$aLastName."' ,".
                        " '".$aLogin."' ,".
                        " '".$aPassWord."' ,".
                        " '".$aPhone."' ,".
                        " '".$aEmail."', ".
                        " '".$aImage."' ".
                        ");";
                        
        //echo $aStreamSQL;
         
        //echo $_SESSION['APP_FILE'];
      
                        
        //EXECUTE QUERY
        $result = $aDBService->ExecuteMySQL($aStreamSQL);
        
        header("location:adminUsers.php");
       
	

       

	
 ?>