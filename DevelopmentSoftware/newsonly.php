<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include_once dirname(__FILE__).'/layerBusiness/processNews.php';
	
	        
        //создать сессию
        session_start();
        
        if (!isset($_SESSION['asLanguage'])){
        
            $_SESSION['asLanguage']= 'en';
        }
      
        
        if (!isset($_SESSION['asParentID'])){
        
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
        
        <!-- Custom Theme files -->
        <link href="css/theme-style.css" rel='stylesheet' type='text/css' />
        
        <!----font-Awesome----->
        <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
        
       
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>

        <!-- bxSlider CSS file -->
        <link href="css/jquery.bxslider.css" rel="stylesheet" />
        
        <!---- news ---->
        <link rel="stylesheet" href="css/sass-compiled.css" />
        
        
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
    
       
    
        <!---- M E N U---->
        <div id="home" class="header scroll">
            <!----start-header---->
            <div class="container">
                
                <!---- start-logo---->
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" title="omicron" /></a>
                </div>
                <!---- //End-logo---->

                <!----start-top-nav---->
                <nav class="top-nav">
                    
                
                    <?php
    
                        $aLanguage = $_SESSION['asLanguage'];
                        $aParentID = $_SESSION['asParentID'];

                        //создать переменние
                        $aProcessNews = new ProcessNews();
                     
                        $aIDNews = $_GET['newsonly'];
                        
                        $aProcessNews->Get_NewsOnly($aIDNews, $aLanguage);
                    
                    ?>
                    
                    <a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
                </nav>
                
                           
                <header>
                    <div class="wrapper">
                        
                        <h1>  
                            <?php
                                echo $aProcessNews->GetTitle();
                            ?>
                        </h1>
                        
                        <p>
                           
                           Article. 
                           <?php
                                echo $aProcessNews->GetData();
                           ?>
                        </p>
                    </div>
                </header>
                
                
                <div class="container">     
                                
                    <div class="head text-center">            
                        <div  class="pic">
                            <img src="<?php echo $aProcessNews->GetImage(); ?>" class="pic-image" alt="Pic"/>

                        </div>
                    </div>
                                
                    <div class="head text-justify">
                              
                        
                    
                        
                        <?php
                            echo $aProcessNews->GetSmallContent();
                        ?>

                        <br/>   

                        <?php
                            echo $aProcessNews->GetContent();
                        ?>
                    </div>
               
                    
                </div>
                
                <br/><br/><br/>
                
                
                <!-- FOOTER -->
                <header>
                    <div class="wrapper">
                        <h1><span> </span>More News...</h1>
                    </div>
                </header>
                
                
                <section class="wrapper cl">
                    
                 <div class="pic">
		    <img src="img/01.jpg" class="pic-image" alt="Pic"/>
		    <span class="pic-caption bottom-to-top">
		        <h1 class="pic-title">Bottom to Top</h1>
		        <p>Hi, this is a simple example =D</p>
                        <p> <a href="#"> <strong>V I E W</strong> </a> </p>
		    </span>
		</div>

		<!--Effect: Top to Bottom -->
		<div class="pic">
		    <img src="img/02.jpg" class="pic-image" alt="Pic"/>
		    <span class="pic-caption bottom-to-top">
		        <h1 class="pic-title">Top to Bottom</h1>
		        <p>Hi, this is a simple example =D</p>
                        <p> <a href="#"> <strong>V I E W</strong> </a> </p>
		    </span>
		</div>
		
		<!--Effect: Left to Right -->
		<div class="pic">
		    <img src="img/03.jpg" class="pic-image" alt="Pic"/>
		    <span class="pic-caption bottom-to-top">
		        <h1 class="pic-title">Left to Right</h1>
		        <p>Hi, this is a simple example =D</p>
                        <p> <a href="#"> <strong>V I E W</strong> </a> </p>
		    </span>
		</div>
                    
                    

                </section>
                 
            </div>
	</div>	
      
               
	<!----//End-header---->
	
        
        
        
        <!-- C  O  N  T E N T  -->
        
        <!-- SERVICES 
        <div id="fea" class="features">
                <div class="container">
                            
                    
                    
                    
                </div>
        </div>
	End-SERVICES-->
        
        
        
              
        <!----start-footer---->
        <div class="footer">
                <div class="container">
                        <div class="footer-left">
                                <a href="#"><img src="images/footer-logo.png" title="omicron" /></a>
                                <p> 2 0 1 4</a></p>
                        </div>
                        <script type="text/javascript">
                        $(document).ready(function() {
                                /*
                                var defaults = {
                                        containerID: 'toTop', // fading element id
                                        containerHoverID: 'toTopHover', // fading element hover id
                                        scrollSpeed: 1200,
                                        easingType: 'linear' 
                                };
                                */

                                $().UItoTop({ easingType: 'easeOutQuart' });

                        });
                </script>
                        <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
                </div>
        </div>
        <!----//End-footer---->
        <!----//End-container---->
      
      
      
    </body>
</html>

