<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include_once dirname(__FILE__).'/layerBusiness/processNews.php';
	
	        
        //создать сессию
        session_start();
        
        if (!isset($_SESSION['APP_USERWEB_ID'])){
        
           header("location:login.php");
        } 
        else
        {
            $_SESSION['asLanguage']= 'en';  
            $_SESSION['asParentID']= 0;  
        }
            
      

?>
 

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=unicode-UTF-8" >
        <title>Software Development</title>
        
        <!------------------------------------------------->
        <!--                    JS                       -->
        <!------------------------------------------------->
        
        <!-- jQuery necessary for Bootstrap's JavaScript plugins -->
        <script src="js/jquery.min.js"></script>
        
	<!-- bxSlider Javascript file -->
        <script src="js/jquery.bxslider.min.js"></script>
        
        <!---- start-smoth-scrolling---->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>

        <!---- news  http://www.jqueryrain.com/?QdshaAfp---->
        <script src="js/modernizr.js" type="text/javascript"></script>
        
        
        
             
        <!------------------------------------------------->
        <!--                     CSS                     -->
        <!------------------------------------------------->
        
        <!--favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
      
        <!-- bootstrap -->
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        
        <!----font-Awesome----->
        <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
        
        
        <!-- CUSTOM STYLES-->
        <link href="css/custom.css" rel="stylesheet" />
        
        <!-- MORRIS CHART STYLES-->
        <link href="js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
      
       
        
        
    </head>
    <body>
        
        <script type="text/javascript">
            $(document).ready(function(){

            $('.bxslider').bxSlider({
            auto: true,
            autoControls: true
            
            
            });
            });
        </script>
    
       
    
        <div id="wrapper">
        <!---- M E N U---->
        
            <!-- <div id="home" class="header scroll">-->
                
                <!----start-header---->
                <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">

                    <div class="navbar-header">
                            
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                        <a class="navbar-brand" href="adminMenu.php"><img src="images/logo.png" title="omicron" /></a> 

                    </div>

                    <div style="color: #fd3b01 ;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> 
                        Wellcome &nbsp;&nbsp;
                        <?php
                            echo $_SESSION['APP_USERWEB_NAME']." ".$_SESSION['APP_USERWEB_LASTNAME'];
                        ?>
                        &nbsp;&nbsp;&nbsp;&nbsp; 

                        <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> 
                    </div>
                </nav>


                <nav class="navbar-default navbar-side" role="navigation">

                    <div class="sidebar-collapse">

                        <ul class="nav" id="main-menu">


                            <li class="text-center">
                                <img src="<?php echo $_SESSION['APP_USERWEB_IMAGE'] ?>" class="user-image img-responsive"/>
                            </li>   
                            
                            <li>
                                <a href="adminUsers.php">
                                    <i class="fa fa-users fa-3x"></i> 
                                    Users
                                </a>
                            </li>
                            
                            <li>
                                <a  href="adminServices.php">
                                    <i class="fa fa-bullseye fa-3x"></i> 
                                    Services
                                </a>
                            </li>
                            
                            <li>
                                <a href="adminNews.php">
                                    <i class="fa fa-newspaper-o fa-3x"></i> 
                                    News
                                </a>
                            </li>
                            
                            <li>
                                <a href="adminGallery.php">
                                    <i class="fa fa-photo fa-3x"></i> 
                                    Gallery
                                </a>
                            </li>
                            
                            

                        </ul>
                    </div> 
                </nav>
            
            
                <div id="page-wrapper" >
                    <div id="page-inner">
                         
                        <div class="row">
                            <div class="col-md-12">
                                
                                <h2>
                                    Administration Panel <br/> 
                                    
                                    <a href="index.php">
                                        O M I C R  O N   
                                    </a>
                                </h2>   
                                
                                <h5>Welcome  
                                    <?php
                                        echo $_SESSION['APP_USERWEB_NAME']." ".$_SESSION['APP_USERWEB_LASTNAME'].'.';
                                    ?> 
                                </h5>
                                
                            </div>
                        </div>  
                        
                        
                        
                    </div> 
                <div>
            
            
         <!-- </div>       -->  
    </div>  
               
             
       
      
    </body>
</html>

