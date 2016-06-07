<?php
//показать ощибки
    error_reporting(E_ALL);	
    ini_set('display_errors', '1');

    include 'layerPersistence/serviceConnection.php';
    
    class ProcessAdminNews{
        
        private $aDBService;
        private $aStreamSQL;
        private $aStreamResult;
        
        
        private $aIDUsers;
        private $aFirstName;
        private $aLastName;
        private $aLogin;
        private $aPassword;
        private $aNumberPhone;
        private $aEmail;
        
        
        public function ProcessAdminNews(){

            $this->aDBService = new ServiceMysql();
           
            //start conection
            $this->aDBService->SetUserMySql();
           
            $this->saStreamSQL = '';
           
        }
        
        
        public function ReadNews(){
            
            $this->aStreamResult = '';
            
            $this->aStreamSQL = " select idnews,".
                                " title_en, smallcontent_en, data ".
                                " from omicron.news ".
                                " where enabled = 'S' ".
                                " order by data desc; ";
                              
            //echo $this->aStreamSQL;
                   
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            $this->aStreamResult  = '<div class="tab-pane fade active in" id="home"> ';
            $this->aStreamResult .= '<div class="table-responsive">';
            $this->aStreamResult .= '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
            $this->aStreamResult .= '<thead><tr><th>id</th><th>Title</th><th>SmallContent</th><th>Data</th>';
            $this->aStreamResult .= '<th>Edition</th><th>Delete</th></tr></thead>';
            $this->aStreamResult .= '<tbody>';
                  
            
            while ($row = mysqli_fetch_array($result)) 
            {
                $this->aStreamResult .= '<tr> ';
                $this->aStreamResult .= '<td>'.$row['idnews'].'</td>';
                $this->aStreamResult .= '<td>'.$row['title_en'].'</td>';
                $this->aStreamResult .= '<td>'.$row['smallcontent_en'].'</td>';
                $this->aStreamResult .= '<td>'.$row['data'].'</td>';
                $this->aStreamResult .= '<td><a class="btn btn-warning"  href="adminUsersUpdate.php?idNews='.$row['idnews'].'">Update</a></td>';
                $this->aStreamResult .= '<td><a class="btn btn-danger"   href="adminNewsDelete.php?idNews='.$row['idnews'].'">Delete</a></td>';
                $this->aStreamResult .= '</tr>';
                                  
            } 
            
            
            
            $this->aStreamResult .= '</tbody></table></div></div>';
            
            return $this->aStreamResult;     
            
        }
        
        
        public function GetOnlyNews($pIDNews){
            
            $this->aStreamResult = '';
            
            $this->aStreamSQL = " select idnews,title_en,smallcontent_en,content_en  ".
                                " from omicron.news".
                                " where idnews=".$pIDNews;
            
            //echo $this->aStreamSQL;
                
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            while ($row = mysqli_fetch_array($result)) 
            {
                     
                $this->aStreamResult  = '<div class="col-md-12">';
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>id</label>';
                $this->aStreamResult .= '<input name="txtId" value="'.$row['idnews'].'" class="form-control" disabled/>';
                $this->aStreamResult .= '</div> ';
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>Title</label>';
                $this->aStreamResult .= '<input name="txtFirstName" value="'.$row['title_en'].'" class="form-control" disabled/>';
                $this->aStreamResult .= '</div> ';
                
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>Small Content</label>';
                $this->aStreamResult .= '<textarea class="ckeditor" cols="80" id="txtSmallContent" name="txtSmallContent" rows="10">';
                $this->aStreamResult .=  $row['smallcontent_en'];
                $this->aStreamResult .= '</textarea>';                                                            
                $this->aStreamResult .= '</div> ';
                
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>Content</label>';
                $this->aStreamResult .= '<textarea class="ckeditor" cols="80" id="txtContent" name="txtSmallContent" rows="10">';
                $this->aStreamResult .=  $row['content_en'];
                $this->aStreamResult .= '</textarea>';                                                            
                $this->aStreamResult .= '</div> ';
                
                                
                $this->aStreamResult .= '<div class="form-actions">';
                $this->aStreamResult .= '<button type="submit" class="btn btn-danger">Delete</button> &nbsp;';
                $this->aStreamResult .= '<a class="btn btn-success" href="adminNews.php">Back</a>';
                $this->aStreamResult .= '</div>';
                
                $this->aStreamResult .= '</div>';
                
                
                   
                
            }
            
            return $this->aStreamResult;
            
            
        }
        
        public function GetIDUser(){
            
            return $this->aIDUsers;
        }
        
        public function GetFirstName(){
            
            return $this->aFirstName;
        }
        
        public function GetLastName(){
            
            return $this->aLastName;
        }
        
        public function GetLogin(){
            
            $this->aLogin;
        }
                
        public function GetPass(){
            
            $this->aPassword;
        }        
                
        public function GetPhone(){
            
            $this->aNumberPhone;
        }                
        
        public function GetEmail(){
            
            $this->aEmail;
        } 
                
                
        
        public function CreateUsers(){
            
            
        }
        
        public function DeleteUsers(){
            
        }
        
        public function UpdateUser(){
            
        }
        
    }
    
?>
