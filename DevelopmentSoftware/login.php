<?php
    error_reporting(E_ALL); 
    ini_set('display_errors', '1');
    include_once dirname(__FILE__).'/layerBusiness/processMenu.php';

	session_start();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
	
    <meta charset="utf-8">

    
    <meta http-equiv="Content-Type" content="text/html; charset=unicode-UTF-8" >
    <title>Software Development</title>
    <link rel="shortcut icon" href="favicon.png"> 

    <title>Desarrollo de Aplicaciones</title>

    <!------------------------------------------------->
    <!--                     CSS                     -->
    <!------------------------------------------------->
        
    <!--favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
    <link href="css/animate-custom.css" rel="stylesheet">
   
  </head>

  <body>
    	<!-- start Login box -->
    	<div class="container" id="login-block">
            <div class="row">
		<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                    <div class="login-box clearfix animated flipInY">
	
                        <div class="login-logo">
                            <a href="#"><img src="img/login-icon.png" alt="Company Logo" /></a>
                        </div> 
			
                        <hr />
                        
                        <div class="login-form">
			    <div class="alert alert-error hide">

                                <button type="button" class="close" data-dismiss="alert">&times;</button>
			        <h4>Error!</h4>
			        Your Error Message goes here
                                
			    </div>
						
			
                            <form action="validateLogin.php" method="post"  >
			        		    
                                <input  type="text"      placeholder="User name" name="txtLogin" required/> 
                                <input  type="password"  placeholder="Password"  name="txtPass" required/> 
				
                                <button type="submit"    value="btnLogin" class="btn btn-blue btn-block" >Login</button> 
						   		 
				
                            </form>	
							   		
			</div> 			        	

                    </div>
                </div>
            </div>
    	</div>
     
      	

      
    </body>
</html>
