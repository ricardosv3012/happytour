<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include_once dirname(__FILE__).'/layerBusiness/processAdminServices.php';
	        
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
                                <a  href="adminUsers.php">
                                    <i class="fa fa-users fa-3x"></i> 
                                    Users
                                </a>
                            </li>
                            
                            <li>
                                <a class="active-menu" href="adminServices.php">
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
                                
                                <h2>Services -> Create</h2>   
                                
                            </div>
                        </div>  
                        
                        <hr />
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Form Elements -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Edition Services
                                    </div>
                               
                                    <div class="panel-body">
                                        <div class="row">
                                            
                                            <form  action="processAdminServicesCreate.php" method="post">     
                                                
                                                
                                                <div class="col-md-6">    
                                                                                             
                                                    <div class="form-group">
                                                        <label>Title</label>
                                                        <input name="txtTitle" class="form-control" />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Content</label>
                                                        <input name="txtContent" class="form-control" />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label>Icon</label>
                                                        <input name="txtIcon" class="form-control" />
                                                    </div>
                                                    
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn btn-success">Create</button>
                                                        <a class="btn btn-danger" href="adminServices.php">Back</a>
                                                    </div>
                                                    
                                                </div>
                                                                                
                                            </form>
                                                                       

                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Icons :
                                    </div>
                               
                                    <div class="panel-body">
                                        <div class="row">
                                            
                                            
                                            
	
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/adjust"><i class="fa fa-adjust"></i> fa-adjust</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/anchor"><i class="fa fa-anchor"></i> fa-anchor</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/archive"><i class="fa fa-archive"></i> fa-archive</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/area-chart"><i class="fa fa-area-chart"></i> fa-area-chart</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/arrows"><i class="fa fa-arrows"></i> fa-arrows</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/arrows-h"><i class="fa fa-arrows-h"></i> fa-arrows-h</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/arrows-v"><i class="fa fa-arrows-v"></i> fa-arrows-v</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/asterisk"><i class="fa fa-asterisk"></i> fa-asterisk</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/at"><i class="fa fa-at"></i> fa-at</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/car"><i class="fa fa-automobile"></i> fa-automobile <span class="text-muted">(alias)</span></a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/ban"><i class="fa fa-ban"></i> fa-ban</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/university"><i class="fa fa-bank"></i> fa-bank <span class="text-muted">(alias)</span></a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bar-chart"><i class="fa fa-bar-chart"></i> fa-bar-chart</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bar-chart"><i class="fa fa-bar-chart-o"></i> fa-bar-chart-o <span class="text-muted">(alias)</span></a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/barcode"><i class="fa fa-barcode"></i> fa-barcode</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bars"><i class="fa fa-bars"></i> fa-bars</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/beer"><i class="fa fa-beer"></i> fa-beer</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bell"><i class="fa fa-bell"></i> fa-bell</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bell-o"><i class="fa fa-bell-o"></i> fa-bell-o</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bell-slash"><i class="fa fa-bell-slash"></i> fa-bell-slash</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bell-slash-o"><i class="fa fa-bell-slash-o"></i> fa-bell-slash-o</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bicycle"><i class="fa fa-bicycle"></i> fa-bicycle</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/binoculars"><i class="fa fa-binoculars"></i> fa-binoculars</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/birthday-cake"><i class="fa fa-birthday-cake"></i> fa-birthday-cake</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bolt"><i class="fa fa-bolt"></i> fa-bolt</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bomb"><i class="fa fa-bomb"></i> fa-bomb</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/book"><i class="fa fa-book"></i> fa-book</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bookmark"><i class="fa fa-bookmark"></i> fa-bookmark</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bookmark-o"><i class="fa fa-bookmark-o"></i> fa-bookmark-o</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/briefcase"><i class="fa fa-briefcase"></i> fa-briefcase</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bug"><i class="fa fa-bug"></i> fa-bug</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/building"><i class="fa fa-building"></i> fa-building</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/building-o"><i class="fa fa-building-o"></i> fa-building-o</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bullhorn"><i class="fa fa-bullhorn"></i> fa-bullhorn</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bullseye"><i class="fa fa-bullseye"></i> fa-bullseye</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/bus"><i class="fa fa-bus"></i> fa-bus</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/taxi"><i class="fa fa-cab"></i> fa-cab <span class="text-muted">(alias)</span></a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/calculator"><i class="fa fa-calculator"></i> fa-calculator</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/calendar"><i class="fa fa-calendar"></i> fa-calendar</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/calendar-o"><i class="fa fa-calendar-o"></i> fa-calendar-o</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/camera"><i class="fa fa-camera"></i> fa-camera</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/camera-retro"><i class="fa fa-camera-retro"></i> fa-camera-retro</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/car"><i class="fa fa-car"></i> fa-car</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/caret-square-o-down"><i class="fa fa-caret-square-o-down"></i> fa-caret-square-o-down</a></div>

                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/caret-square-o-left"><i class="fa fa-caret-square-o-left"></i> fa-caret-square-o-left</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/caret-square-o-right"><i class="fa fa-caret-square-o-right"></i> fa-caret-square-o-right</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/caret-square-o-up"><i class="fa fa-caret-square-o-up"></i> fa-caret-square-o-up</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/cc"><i class="fa fa-cc"></i> fa-cc</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/certificate"><i class="fa fa-certificate"></i> fa-certificate</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/check"><i class="fa fa-check"></i> fa-check</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/check-circle"><i class="fa fa-check-circle"></i> fa-check-circle</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/check-circle-o"><i class="fa fa-check-circle-o"></i> fa-check-circle-o</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/check-square"><i class="fa fa-check-square"></i> fa-check-square</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/check-square-o"><i class="fa fa-check-square-o"></i> fa-check-square-o</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/child"><i class="fa fa-child"></i> fa-child</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/circle"><i class="fa fa-circle"></i> fa-circle</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/circle-o"><i class="fa fa-circle-o"></i> fa-circle-o</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/circle-o-notch"><i class="fa fa-circle-o-notch"></i> fa-circle-o-notch</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/circle-thin"><i class="fa fa-circle-thin"></i> fa-circle-thin</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/clock-o"><i class="fa fa-clock-o"></i> fa-clock-o</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/times"><i class="fa fa-close"></i> fa-close <span class="text-muted">(alias)</span></a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/cloud"><i class="fa fa-cloud"></i> fa-cloud</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/cloud-download"><i class="fa fa-cloud-download"></i> fa-cloud-download</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/cloud-upload"><i class="fa fa-cloud-upload"></i> fa-cloud-upload</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/code"><i class="fa fa-code"></i> fa-code</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/code-fork"><i class="fa fa-code-fork"></i> fa-code-fork</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/coffee"><i class="fa fa-coffee"></i> fa-coffee</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/cog"><i class="fa fa-cog"></i> fa-cog</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/cogs"><i class="fa fa-cogs"></i> fa-cogs</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/comment"><i class="fa fa-comment"></i> fa-comment</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/comment-o"><i class="fa fa-comment-o"></i> fa-comment-o</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/comments"><i class="fa fa-comments"></i> fa-comments</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/comments-o"><i class="fa fa-comments-o"></i> fa-comments-o</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/compass"><i class="fa fa-compass"></i> fa-compass</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/copyright"><i class="fa fa-copyright"></i> fa-copyright</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/credit-card"><i class="fa fa-credit-card"></i> fa-credit-card</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/crop"><i class="fa fa-crop"></i> fa-crop</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/crosshairs"><i class="fa fa-crosshairs"></i> fa-crosshairs</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/cube"><i class="fa fa-cube"></i> fa-cube</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/cubes"><i class="fa fa-cubes"></i> fa-cubes</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/cutlery"><i class="fa fa-cutlery"></i> fa-cutlery</a></div>
                                <div class="fa-hover col-md-3 col-sm-4"><a href="../icon/tachometer"><i class="fa fa-dashboard"></i> fa-dashboard <span class="text-muted">(alias)</span></a></div>
                                            
                                            
                                            
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

