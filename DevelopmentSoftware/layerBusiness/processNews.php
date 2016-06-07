<?php

//показать ощибки
    error_reporting(E_ALL);	
    ini_set('display_errors', '1');

    include 'layerPersistence/serviceConnection.php';
    
    class ProcessNews{
        
        private $aDBService;
        private $aStreamSQL;
        private $aStreamResult;
        private $aFlagSQL;
        private $aTitle;
        private $aSmallContent;
        private $aContent;
        private $aFooter;
        private $aData;
        private $aImage;
                

        
        public function ProcessNews(){

            $this->aDBService = new ServiceMysql();
           
            //start conection
            $this->aDBService->SetUserMySql();
           
            $this->aFlagSQL = 1;
           
            $this->aTitle = '';
            $this->aSmallContent= '';
            $this->aContentt= '';
            $this->aFooter= '';
            $this->aData = '';
            $this->aImage= '';
                
        }
        
                
        public function Get_News($plang) {
            
            $this->aStreamResult = '';
            
            $this->aStreamSQL = " select nw.idnews,pro.idprocess, pro.name_".$plang.",". 
                                " pro.subname_".$plang.",". 
                                " concat( nw.href,'?newsonly=', nw.idnews) as href1  ,  ".
                                " pro.name_".$plang.", nw.title_".$plang.",".
                                " nw.smallcontent_".$plang.", footer_".$plang.",".
                                " icon, image,  date_format( data ,'%Y-%m-%d') as data ".
                                " from omicron.process pro ".
                                " inner join omicron.news nw on (nw.idprocess = pro.idprocess) ".
                                " where nw.enabled = 'S' ".
                                " order by nw.data desc ";
        
            echo $this->aStreamSQL;
                
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            while ($row = mysqli_fetch_array($result)) 
            {
                if ($this->aFlagSQL == 1)
                {
                    $this->aStreamResult  = '<header>';
                    $this->aStreamResult .= '<div class="wrapper">';
                    $this->aStreamResult .= str_replace( "h3", "h1", $row['name_'.$plang] ) ; 
                    $this->aStreamResult .= $row['subname_'.$plang];
                    $this->aStreamResult .= '</div></header>';
                    
                    $this->aStreamResult .= '<section class="wrapper cl">';
                    
                    $this->aFlagSQL = 2;
                }
                
                
                $this->aStreamResult .= '<div class="pic">';
                $this->aStreamResult .= '<img src="'.$row['image'].'" class="pic-image" alt="Pic"/>';
                $this->aStreamResult .= '<span class="pic-caption bottom-to-top">';
                $this->aStreamResult .= '<h1 class="pic-title">'.$row['title_'.$plang].' </h1>';
                $this->aStreamResult .= '<p>'. $row['smallcontent_'.$plang] .'</p>';
                $this->aStreamResult .= '<p> <a href="'.$row['href1'] .'"> <strong>V I E W</strong> </a> </p>';
                $this->aStreamResult .= '<p> '.$row['data'] .' </p>';
                $this->aStreamResult .= '</span>';
                $this->aStreamResult .= '</div>';
                      
            } 
            
            $this->aStreamResult .= '</section>';
             
            return $this->aStreamResult;
            
        }
        
        
        public function Get_NewsOnly($pIDNewsOnly,$plang) {
            
            $this->aStreamResult = '';
            
            $this->aStreamSQL = " select idnews, title_".$plang.", smallcontent_".$plang.", ".
                                " content_".$plang.", footer_en,icon, ".
                                " image, href, data".
                                " from omicron.news".
                                " where idnews = '".$pIDNewsOnly."'";
                                
        
            //echo $this->aStreamSQL;
                
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            while ($row = mysqli_fetch_array($result)) 
            {
                
                $this->aTitle        = $row['title_'.$plang];
                $this->aSmallContent = $row['smallcontent_'.$plang];
                $this->aContent      = $row['content_'.$plang];
                $this->aFooter       = $row['footer_'.$plang];
                $this->aData         = $row['data'];
                $this->aImage        = $row['image'];
                                  
            } 
            
        }
        
        
        public function GetTitle() {
            return $this->aTitle;
        }
        
        public function GetSmallContent() {
            return $this->aSmallContent;
        }
        
        public function GetContent() {
            return $this->aContent;
        }
        
        public function GetFooter() {
            return $this->aFooter;
        }
        
        public function GetImage() {
            return $this->aImage;
        }
        
        public function GetData() {
            return $this->aData;
        }
    }

?>
