<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include_once dirname(__FILE__).'/layerBusiness/processAdminUsers.php';
	        
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
        
	<!-- BOOTSTRAP SCRIPTS -->
        <script src="js/bootstrap.min.js"></script>
        
        <!-- UPLOAD FILE -->
        <script src="js/jquery.uploadify.min.js" type="text/javascript"></script>
        
        
        
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
        
        <!-- UPLOAD FILE -->
        <link rel="stylesheet" type="text/css" href="css/uploadify.css">
        
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
      
        <script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
                $('#file_upload').uploadify({
		'formData' : {
                                'timestamp' : '<?php echo $timestamp;?>',
                                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
                              },
                              'swf'      : 'uploadify.swf',
			      'uploader' : 'uploadify.php'
			});
		});
	</script>
        
        
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
                                <a class="active-menu" href="adminUsers.php">
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
                                
                                <h2>Users -> Create</h2>   
                                
                            </div>
                        </div>  
                        
                        <hr />
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Form Elements -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Edition User's
                                    </div>
                               
                                    <div class="panel-body">
                                        <div class="row">
                                            
                                            <form  action="processAdminUserCreate.php" method="post">     
                                                
                                                
                                                <div class="col-md-6">    
                                                     
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input name="txtFirstName" class="form-control" />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input name="txtLastName" class="form-control" />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Login</label>
                                                        <input name="txtLogin" class="form-control" />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="txtPass" class="form-control" />
                                                    </div>
                                                    
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-success">Create</button>
                                                        <a class="btn btn-danger" href="adminUsers.php">Back</a>
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                                
                                                <div class="col-md-6">    
                                                     
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input name="txtPhone" class="form-control" />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input name="txtMail" class="form-control" />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <input id="file_upload" name="file_upload" type="file" multiple="true">
                                                    </div> 
                                                </div>
                                                
                                               
                                            </form>
                                                                       

                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                                
                                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    </div> 
                <div>
            
            
         <!-- </div>       -->  
    </div>  
               
             
       
      
    </body>
</html>

