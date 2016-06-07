<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include_once dirname(__FILE__).'/layerBusiness/processAdminNews.php';
	        
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
        
        <!-- ck editor -->
        <script src="ckeditor/ckeditor.js"></script>
        <script src="ckeditor/adapters/jquery.js"></script>
        <script src="ckfinder/ckfinder.js"></script>
        <script>
            //необходимо для работы редактора (заменить только #id)
            $(document).ready( function() 
            {
                $('#txtContent').ckeditor(function() 
                {
                       CKFinder.setupCKEditor(this,'ckfinder/');

                });
                
                $('#txtSmallContent').ckeditor(function() 
                {
                        CKFinder.setupCKEditor(this,'ckfinder/');

                });
            });
	</script>
        
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
                                <a  class="active-menu" href="adminNews.php">
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
                                
                                <h2>News -> Create</h2>   
                                
                            </div>
                        </div>  
                        
                        <hr />
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Form Elements -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Edition News
                                    </div>
                               
                                    <div class="panel-body">
                                        <div class="row">
                                            
                                            <form  action="processAdminNewsCreate.php" method="post">     
                                                
                                                
                                                <div class="col-md-12">    
                                                     
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input name="txtTitle" class="form-control" />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Small Content</label>
                                                        <textarea class="ckeditor" cols="80" id="txtSmallContent" name="txtSmallContent" rows="10">
                                                            
                                                        </textarea>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Content</label>
                                                        <textarea class="ckeditor" cols="80" id="txtContent" name="txtContent" rows="10">
                                                            
                                                        </textarea>
                                                    </div>
                                                    
                                                   
                                                    <div class="form-group">
                                                        <label>Image Thumbnail</label>
                                                        <input id="file_upload" name="file_upload" type="file" multiple="true">
                                                    </div> 
                                                    
                                                    
                                                    
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-success">Create</button>
                                                        <a class="btn btn-danger" href="adminNews.php">Back</a>
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

