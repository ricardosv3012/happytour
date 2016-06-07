<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	include_once dirname(__FILE__).'/layerBusiness/processMenu.php';
	
	        
        //создать сессию
        session_start();
        
        if (!isset($_SESSION['asLanguage'])){
        
            $_SESSION['asLanguage']= 'en';
        }
        else
        {
            $_SESSION['asLanguage']= 'en';
        }
        
        if (!isset($_SESSION['asParentID'])){
        
            $_SESSION['asParentID']= 0;
        }
        
             
        //print_r ($_SESSION['asLanguage'] );
        //print_r ($_SESSION['asParentID'] );
        
        
	

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
        
        
        <!---- start-smoth-scrolling---->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        
        
         <!-- google maps  https://hpneo.github.io/gmaps/ -->
        <script type="text/javascript" src="js/googleapi.js"></script>
        <script type="text/javascript" src="js/gmaps.js"></script>
        
        
        
        <script type="text/javascript">
                jQuery(document).ready(function($) {
                    $(".scroll").click(function(event){		
                        event.preventDefault();
                        $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
                    });
                    
                    $().UItoTop({ easingType: 'easeOutQuart' });
                    
                    map = new GMaps({
                        el: '#map',
                        lat : 60.009015,
                        lng : 30.378015,
                    });
                    
                    
                    map.addMarker({
                        
                        lat : 60.009015,
                        lng: 30.378015,
                        title: 'Lima',
                        details: {
                          database_id: 42,
                          author: 'HPNeo'
                        },
                        click: function(e){
                          if(console.log)
                            console.log(e);
                          alert('You clicked in this marker');
                        },
                        mouseover: function(e){
                          if(console.log)
                            console.log(e);
                        }
                    });
                    
                    map.addMarker({
                        lat : 60.009015,
                        lng: 30.378015,
                        title: 'Marker with InfoWindow',
                        infoWindow: {
                          content: '<p>Политечническая/ <br/> (omicron)  </p>'
                        }
                    });
                    
                    
                });
        </script>
        

        
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> 
            addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        </script>
	
	
        <!--  start-top-nav-script  -->
        <script>
            $(function() {
                var     pull 	   = $('#pull');
                    menu 	   = $('nav ul');
                    menuHeight = menu.height();
                $(pull).on('click', function(e) {
                    e.preventDefault();
                    menu.slideToggle();
                });
                $(window).resize(function(){
                    var w = $(window).width();
                    if(w > 320 && menu.is(':hidden')) {
                        menu.removeAttr('style');
                    }
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
        
        <!-- Custom Theme files -->
        <link href="css/theme-style.css" rel='stylesheet' type='text/css' />
        
        <!----font-Awesome----->
        <link rel="stylesheet" href="fonts/css/font-awesome.min.css">
        
        <!----google maps----->  
        <link rel="stylesheet" type="text/css" href="css/examples.css" />
        
       
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css'>


        
    </head>
    <body>
    
        <!-- efect   menu-->
        <script>
            (function(i,s,o,g,r,a,m){i['']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','','ga');
            ga ('create', 'UA-30027142-1', 'w3layouts.com');
            ga('send', 'pageview');
        </script>

        <script async src=''></script>
        
        <!-- w3layouts_970x90 -->
        <ins class=''
             style='display:block;width:970px;height:90px;margin:0 auto;'
             data-ad-client='ca-pub-9153409599391170'
             data-ad-slot='2384823885'>
        </ins>
    
    
               
        
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
                        $aProcessMenu = new ProcessMenu();
                        $aProcessMenu->Building_Menu($aParentID, $aLanguage,0,0);

                    ?>
                    <a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
                    
                    <!--
                        <ul class="top-nav">
                                <li class="active"><a href="#home" class="scroll">Home</a></li>
                                <li class="page-scroll"><a href="#fea" class="scroll">Services</a></li>
                                <li class="page-scroll"><a href="#test" class="scroll">News</a></li>
                                <li class="contatct-active" class="page-scroll"><a href="#contact" class="scroll">Contact</a></li>
                        </ul>
                        <a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
                    --> 
                   
                        
                </nav>
                
                
                <div class="clearfix"> </div>
                <div class="slide-text text-center">
                    
                    <!-- заголовок в центре -->
                    <?php
                        echo   $aProcessMenu->GetTitleMenu() ;
                    ?>
                
                </div>
                <!----//End-top-nav---->
                
            </div>
	</div>	
      
        
        <div class="ad728x90" style="text-align:center">
            <script async src=""></script>
            <!-- w3layouts_demo_728x90 -->
            <ins class=""
                 style="display:inline-block;width:728px;height:20px"
                 data-ad-client="ca-pub-9153409599391170"
                 data-ad-slot="8639520288"></ins>
					
	</div>
	<!----//End-header---->
		
        
        
        <!-- C  O  N  T E N T  -->
        
        <!----start- SERVICES -->
        <div id="fea" class="features">
                <div class="container">
                    
                        <div class="head text-center">
                               
                                <?php
                                    echo $aProcessMenu->Building_Services_Title($aLanguage);
                                ?>
                                                      
                        </div>
                    
                        <!---- start-features-grids---->
                        <div class="features-grids text-center">
                            
                                <?php
                                    echo $aProcessMenu->Building_Services_Content($aLanguage);
                                ?>                    
                                                           
                                <div class="clearfix"> </div>
                        </div>
                        <!---- //End-features-grids---->
                </div>
        </div>
	<!----//End-SERVICES----->
        
        
        
        <!----N E W S---->
        <div  id="test" class="testimonial">
            <div class="container">
                
                <div class="head text-center">
                                      
                    <?php
                        echo $aProcessMenu->Building_News_Title($aLanguage);
                    ?>
                
                </div>
                
                
               <!----start-news-time-line---->
               <div class="test-monial-time-line">
                   
                   <?php
                        echo $aProcessMenu->Building_News_Content($aLanguage);
                    ?>
                   
                           
                    <div class="test-monial-timeline-connector">
                            <span> </span>
                    </div>
                   
                    <div class="clearfix"> </div>
                    <a class="more-testmonial-time-line" href=" <?php echo $aProcessMenu->GetMorehref() ?> "> 
                        <span>More</span>
                    </a>
                    
               </div>
               
               
            </div>
        </div>
        <div class="clearfix"> </div>
        
        <br></br>
        
        <br></br>
        
        <br></br>

        <!----//End NEWS---->
        
        
        
        
        
        <!-- how work -->
        <div class="work">
            <div class="container">
                <div class="head text-center work-head">
                        <h3>
                            <span> </span> How We Work
                        </h3>
                        <p> 
                            We standards and models of software development 
                            as required by the global market to provide quality products 
                        </p>
                </div>
                <!---- start-work-grids----->
                <div class="work-grids">
                    <div class="col-md-4 work-grid">
                        <span class="col-md-5 w-icon"> <i class="fa fa-search"> </i></span>
                        <div class="col-md-7 work-info">
                            <h4>Research</h4>
                            <p> 
                                We constantly innovation for it is necessary to 
                                investigate new technologies so that our customers 
                                receive products who are at the forefront.

                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 work-grid center-work-grid">
                        <span class="col-md-5 w-icon"> <i class="fa fa-cogs"> </i></span>
                        <div class="col-md-7 work-info">
                                <h4>Design</h4>
                                <p>
                                    Here comes the styles 
                                    and creative designs for our can 
                                    use them.
                                </p>
                        </div>
                    </div>
                    <div class="col-md-4 work-grid">
                        <span class="col-md-5 w-icon">
                                <i class="fa fa-code"> </i> 
                        </span>
                        <div class="col-md-7 work-info">
                            <h4>Develop</h4>
                            <p>
                                We apply object-oriented programming and design
                                patterns in order that our applications are 
                                coded  quality staff to perform this task
                            </p>                                             
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="work-map">
                        <span> </span>
                    </div>
                </div>
                <!---- //End-work-grids----->
            </div>
        </div>
        <!---- //End-work---->

        <!-- how work -->
        
        
        
        
        
        


        <!----start-contact---->
        
        <div id="contact" class="contact"> 
        
                <div class="contact-map">
                    
                    <iframe src="">
                                    
                    
                    </iframe>
                    <br />
                    
                </div>
                
                <div class="contact-grids">
                    <div class="col-md-6 contact-left">
                            <h3><span> </span> Contact</h3>
                            <p><i class="fa fa-map-marker"> </i> O M I C R O N , Гражданский проспект</p>
                            <form>
                                    <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
                                    <input type="text" value="Mail" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email@domain.com *';}">
                                    <textarea onfocus="if(this.value == 'message') this.value='';" onblur="if(this.value == '') this.value='Message *;">Message</textarea>
                                    <!--<p class="conditions"> <label><span>*</span>scelerisque sit amet felis sit nunc.</label></p>-->
                                    <span class="submit-btn"><input type="submit" value="Send"></span> 
                            </form>
                    </div>
                    
                    
                    <div class="col-md-6 contact-right">
                            <!--GOOGLE MAPS -->
                            
                                <br/><br/>                               
                                <p></p>
                                <div class="span11">
                                    <div id="map"></div>
                                </div>
                            
                        
                    </div>
                   
                </div>
            
        </div>
	<!----//End-contact---->


        
        <!----start-footer---->
        <div class="footer">
                <div class="container">
                        <div class="footer-left">
                                <a href="login.php"><img src="images/footer-logo.png" title="omicron" /></a>
                                <p> 2 0 1 4</a></p>
                        </div>
                        <script type="text/javascript">
                        
                </script>
                        <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
                </div>
        </div>
        <!----//End-footer---->
        <!----//End-container---->
      
    </body>
</html>

