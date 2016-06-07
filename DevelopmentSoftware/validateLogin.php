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
	$aUser = $_POST['txtLogin'];
	$aPass = $_POST['txtPass'] ;
	
         echo "<script languaje='javascript'>alert('".$aUser."');</script>";
	
        $aStreamSQL = '';
            
        $aStreamSQL =   " select idusers, firtname, lastname, image".
                        " from omicron.users ".
                        " where login='".$aUser."'".
                        " and password='".$aPass."'".
                        " and enabled='S' ";
        
        
                        
        //EXECUTE QUERY
        $result = $aDBService->ExecuteMySQL($aStreamSQL);
        
        $count = 0;
        $aIDLogin = '';
        $aIDNameUser = '';
        $aIDLastNameUser = '';
        $aIDImage = '';
        
	    	
        while ($row = mysqli_fetch_array($result))
        {
            $count++;
            $result = $row;
            $aIDLogin        = $row['idusers'];
            $aIDNameUser     = $row['firtname'];
            $aIDLastNameUser = $row['lastname'];
            $aIDImage        = $row['image'];
        }

        if($count > 0)
        {
            //seteamos completamente al usuario
            
            $_SESSION['APP_USERWEB_ID']       = $aIDLogin;
            $_SESSION['APP_USERWEB_USER']     = $aUser;
            $_SESSION['APP_USERWEB_NAME']     = $aIDNameUser;
            $_SESSION['APP_USERWEB_LASTNAME'] = $aIDLastNameUser;
            $_SESSION['APP_USERWEB_IMAGE']    = $aIDImage;
            

            //перенаправление 
            header("location:adminMenu.php");    
            
        }
        else
        {
            header("location:login.php");
        }
	

       

	
 ?>