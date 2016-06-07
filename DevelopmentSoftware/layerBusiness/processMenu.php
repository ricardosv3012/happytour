<?php
    //показать ощибки
    error_reporting(E_ALL);	
    ini_set('display_errors', '1');

    include 'layerPersistence/serviceConnection.php';
    
    class ProcessMenu{
        
        
        private $aDBService;
        private $aStreamSQL;
        private $aStreamResult;
        private $aTitleMenu;
        private $aMorehref;

        public function ProcessMenu(){

           $this->aDBService = new ServiceMysql();
           
           //start conection
           $this->aDBService->SetUserMySql();
           
           $this->aTitleMenu = '';
           $this->aStreamResult = '';
           $this->aMorehref = '';
           
        } 
        
        
        
        public function Building_Services_Title($plang) {
            
            $this->aStreamResult = '';
            
            $this->aStreamSQL = " select idprocess, name_".$plang. ", subname_".$plang." ,href ".
                                " from omicron.process ".
                                " where idprocess=1 " ;
            
                       
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            while ($row = mysqli_fetch_array($result)) 
            {
                $this->aStreamResult  = $row['name_'.$plang];
                $this->aStreamResult .= $row['subname_'.$plang];
                
            } 
             
            return $this->aStreamResult;
            
        }
        
               
        public function Building_Services_Content($plang) {
            
            $this->aStreamResult = '';
            
            $this->aStreamSQL = " select idservices, title_".$plang. ", content_".$plang.", footer_".$plang.
                                " , icon, href".
                                " from omicron.services ".
                                " where enabled = 'S' " ;
            
            //echo $this->aStreamSQL;
                       
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            while ($row = mysqli_fetch_array($result)) 
            {
                $s1 = '<div class="col-md-3 features-grid">';
                $s2 = '<span class="fea-icon1"><i class="'.$row['icon'].'"> </i> </span>';
                $s3 = '<h3><a href="'.$row['href'].'">'.$row['title_'.$plang].'</a></h3>';
                $s4 = $row['content_'.$plang];
                $s5 = '</div>';
                
                $this->aStreamResult  = $this->aStreamResult.$s1.$s2.$s3.$s4.$s5;
                
            } 
             
            return $this->aStreamResult;
            
        }
        
        
        public function Building_News_Title($plang)
        {
            $this->aStreamResult = '';
            
            $this->aStreamSQL = " select idprocess, name_".$plang. ", subname_".$plang.",href ".
                                " from omicron.process ".
                                " where idprocess=2 " ;
            
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            while ($row = mysqli_fetch_array($result)) 
            {
                $this->aStreamResult  = $row['name_'.$plang];
                $this->aStreamResult .= $row['subname_'.$plang];
                $this->aMorehref      = $row['href'];
            } 
             
            return $this->aStreamResult;
        }
        
        public function Building_News_Content($plang) {
            
            $this->aStreamResult = '';
            $aFlagNews = 1;
            
            $this->aStreamSQL = " select idnews, idprocess, title_".$plang. ", smallcontent_".$plang.", footer_".$plang.",".
                                " icon, image, href".
                                " from omicron.news".
                                " where idprocess = 2 ".
                                " and enabled='S' order by data desc".
                                " limit 3 " ;
            
               
            //echo $this->aStreamSQL;
                       
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            while ($row = mysqli_fetch_array($result)) 
            {   
                if ($aFlagNews == 3)
                {
                    $s1 = '<div class="test-monial-time-line-grid test-monial-time-line-grid-r2">';
                    $s2 = '<div class="col-md-3 test-monial-time-line-left-pic">';
                    $s3 = '<img src="'.$row['icon'].'" title="name" />';
                    $s4 = '<a href="'.$row['href'].'?newsonly='.$row['idnews'].'">'.$row['title_'.$plang].'</a>';
                    $s5 = '</div><div class="col-md-9 test-monial-time-line-left-text">';
                    $s6 = $row['smallcontent_'.$plang];
                    $s7 = '</div><span class="grid-point grid-point1"> </span> </div>';
                    $s8 = '<div class="clearfix"> </div>';
                    $s9 = '</div>';
                  
                    
                    $this->aStreamResult  = $this->aStreamResult.$s1.$s2.$s3.$s4.$s5.$s6.
                                                                 $s7.$s8.$s9;
                    $aFlagNews = 99;
                }   
                
                
                if ($aFlagNews == 2)
                {
                    $s1 = '<div class="col-md-6 test-monial-time-line-right">';
                    $s2 = '<div class="test-monial-time-line-grid test-monial-time-line-grid-r1">';
                    $s3 = '<div class="col-md-3 test-monial-time-line-left-pic">';
                    $s4 = '<img src="'.$row['icon'].'" title="name" />';
                    $s5 = '<a href="'.$row['href'].'?newsonly='.$row['idnews'].'">'.$row['title_'.$plang].'</a>';
                    $s6 = '</div><div class="col-md-9 test-monial-time-line-left-text">';
                    $s7 = $row['smallcontent_'.$plang];
                    $s8 = '</div><span class="grid-point grid-point1"> </span>';
                    $s9 = '</div>';
                                       
                    $this->aStreamResult  = $this->aStreamResult.$s1.$s2.$s3.$s4.$s5.$s6.
                                                                 $s7.$s8.$s9;
                    $aFlagNews = 3;
                }                
                            
                
                if ($aFlagNews == 1)
                {
                    $s1 = '<div class="col-md-6 test-monial-time-line-left">';
                    $s2 = '<div class="test-monial-time-line-grid test-monial-time-line-grid-l1">';
                    $s3 = '<div class="col-md-9 test-monial-time-line-left-text">';
                    $s4 = $row['smallcontent_'.$plang];
                    $s5 = '</div>';
                    $s6 = '<div class="col-md-3 test-monial-time-line-left-pic">';
                    $s7 = '<img src="'.$row['icon'].'" title="name" />';
                    $s8 = '<a href="'.$row['href'].'?newsonly='.$row['idnews'].'">'.$row['title_'.$plang].'</a>';
                    $s9 = '</div>';
                    $s10 = '<span class="grid-point"> </span>';
                    $s11 = '</div>';
                    $s12 = '</div>';
                    
                    
                    $this->aStreamResult  = $this->aStreamResult.$s1.$s2.$s3.$s4.$s5.$s6.
                                                                 $s7.$s8.$s9.$s10.$s11.$s12;
                    $aFlagNews = 2;
                }
                
               
                
                
                
                
                
            } 
             
            return $this->aStreamResult;
            
            
        }
        
        
        public function Building_Menu($pParent_id=0, $plang='en', $plevel = 0, $mod_rewr=0)
        {
         
            //признак корневой директории
            $isroot = false;
			
            $this->aStreamSQL = " select cat.idcategory as local_id, cat.name_".$plang.",". 
                                " cat.parent_id,tp.idtype , tp.name, tp.filephp,".
                                " pg.idpage , pg.title_".$plang.",". 
                                " pg.content_".$plang.",". 
                                " ( select COUNT(cat2.name_".$plang.")". 
                                " from omicron.category cat2 ". 
                                " where cat2.name_".$plang."!= ''".
                                " and cat2.idcategory = local_id".
                                " ) as cat_num".
                                " from omicron.category cat".
                                " left join omicron.type tp on (tp.idtype = cat.idtype)".
                                " left join omicron.page pg on (pg.idpage = cat.idpage) ".
                                " where cat.section= 'MENU' ";
            
            
            //LEVEL
            if ($pParent_id == 0) {

                    $this->aStreamSQL .= " and cat.parent_id is null";

                    //старт из корневой директории
                    $isroot = true;

            }
            else {

                    $this->aStreamSQL .= " and cat.parent_id = '" .$pParent_id."'";
            }
            
            
            //echo $this->aStreamSQL;
            
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            
            //класс для вложенного выпадающего меню
            $ul_type = ' class="dropdown-menu"';
            $li_type = '';

            //атрибуты у ссылок
            $a_type = '';
			
		
            //если вывод происходит от корня
            if ($isroot == true){

                //корневому меню 
                $ul_type = ' class="top-nav"'; //class="nav navbar-nav pull-right"
                echo('<ul'.$ul_type.'>');

            }
			
			
            //открываем список родительского меню
            //echo('<ul'.$ul_type.'>');

            //количество пунктов меню (разделов страниц из бд)
            $numrows = mysqli_num_rows( $result );

            //счетчик
            $counter = 0;
            
            
            while ($row = mysqli_fetch_array($result)) 
            {
                switch ($plevel)
                {
                        case 0:
                                //$li_type = 'primary';	
                                //$a_type	='firstLevel';
                                if($row['local_id']==1)
                                {
                                    $li_type = 'active';
                                }
                                else
                                {
                                    $li_type = 'page-scroll';	
                                }
                                if($row['local_id']== $numrows)
                                {
                                    $li_type ='contatct-active';
                                }
                                
                               
                                if($this->aTitleMenu == '')
                                {
                                    $this->aTitleMenu = $row['title_'.$plang];
                                }
                                
                                //$a_type	='dropdown-toggle';
                                $a_type	='scroll';

                                break;

                        case 1:
                                //$li_type = 'dropdownSubmenu';		
                                $li_type = '';		
                                $a_type	='';
                                break;
                        default:
                                $li_type = '';		
                                $a_type	='';
                                break;
                }
                        
                $cur_class='';

                $counter += 1; 
                if( !isset($row['name_'.$plang])|| $row['name_'.$plang] == ''  )
                        continue;

                //тип страницы
                $type= $row['filephp'];

                if($type == 'index')
                        continue;

                //показатель наличия подразделов
                $has_child = false;

                if($row['cat_num'] > 0 )//подсчет подкатегорий
                        $has_child = true;// есть ли вложенность?

			
            //	if((isset($_SESSION['cat'])) && ($_SESSION['cat'] == $row['local_id']) )// проверим вдруг выбрана родительская категория
            //		$cur_class='active';
            //	else if($has_child) // вдруг была выбрана какая-то из вложенных. в таком случае нужно так же выбрать родительскую
            //		if(chek_if_child_selected($row['local_id'] , $lang))
            //			$cur_class='active';
		
			 
                //if( $has_child )
                //	$a_type = ( ( $a_type != '')? $a_type.' hasSubMenu' : 'hasSubMenu' );

                if($cur_class != '')
                        $a_type = ( ( $a_type != '')? $a_type.' '.$cur_class : $cur_class );

                if( $isroot && $numrows == $counter)
                        $a_type = ( ( $a_type != '')? $a_type.' last' : 'last' );

                echo('<li '.( ($li_type != '')? 'class="'.$li_type.'"' : '' ).'>');		

			
                if(!$mod_rewr)
                {

                        //обычные ссылки
                        if ($plevel == 0 )
                        {
                            echo('<a '.( ($a_type != '')? 'class="'.$a_type.'"' : '' ).
                                 ' href="'.$type.'">'.$row['name_'.$plang].'</a>');
                        }
                        else
                        {

                            echo('<a '.( ($a_type != '')? 'class="'.$a_type.'"' : '' ).
                                     ' href="'.$type.'?cat='.$row['local_id'].'">'.$row['name_'.$plang].'</a>');
                        }
                }
                else{
                        //человеко-понятные ссылки
                        echo('<a '.( ($a_type != '')? 'class="'.$a_type.'"' : '' ).
                        ' href="'.(( isset($row['rewrite_url']) &&  $row['rewrite_url'] != '' )? $row['rewrite_url'] : "").'">'.
                        $row['name_'.$plang].'</a>');
                }
			
                    // для каждого пункта меню вызываем рекурсивную функцию
                    if($has_child)
                            $this->Building_Menu($row['local_id'], $plang , $plevel+1 ); 

                    echo ('</li>');
			
            }
              
            
            if ($isroot == true){
                echo '</ul>';
            }
            
	}
        
        
        public function GetTitleMenu()
        {
            return $this->aTitleMenu;
        }
        
        public function GetMorehref()
        {
            return $this->aMorehref ;
        }
        
        
        
    }

?>
