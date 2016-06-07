<?php
//показать ощибки
    error_reporting(E_ALL);	
    ini_set('display_errors', '1');

    include 'layerPersistence/serviceConnection.php';
    
    class ProcessAdminServices{
        
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
        
        
        public function ProcessAdminServices(){

            $this->aDBService = new ServiceMysql();
           
            //start conection
            $this->aDBService->SetUserMySql();
           
            $this->saStreamSQL = '';
           
        }
        
        
        public function ReadServices(){
            
            $this->aStreamResult = '';
            
            $this->aStreamSQL = " select idservices, title_en, content_en, icon ".
                                " from omicron.services".
                                " where enabled='S'; ";
                              
            //echo $this->aStreamSQL;
                
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            $this->aStreamResult  = '<div class="tab-pane fade active in" id="home"> ';
            $this->aStreamResult .= '<div class="table-responsive">';
            $this->aStreamResult .= '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
            $this->aStreamResult .= '<thead><tr><th>id</th><th>Title</th><th>Content</th><th>Icon</th>';
            $this->aStreamResult .= '<th>Edition</th><th>Delete</th></tr></thead>';
            $this->aStreamResult .= '<tbody>';
                  
            
            while ($row = mysqli_fetch_array($result)) 
            {
                $this->aStreamResult .= '<tr> ';
                $this->aStreamResult .= '<td>'.$row['idservices'].'</td>';
                $this->aStreamResult .= '<td>'.$row['title_en'].'</td>';
                $this->aStreamResult .= '<td>'.$row['content_en'].'</td>';
                $this->aStreamResult .= '<td>'.$row['icon'].'<br/><br/><span class="col-md-5 w-icon"><i class="'.$row['icon'].'"> </i></span> </td>';
                $this->aStreamResult .= '<td><a class="btn btn-warning"  href="adminServicesUpdate.php?idServices='.$row['idservices'].'">Update</a></td>';
                $this->aStreamResult .= '<td><a class="btn btn-danger"   href="adminServicesDelete.php?idServices='.$row['idservices'].'">Delete</a></td>';
                $this->aStreamResult .= '</tr>';
                                  
            } 
            
            $this->aStreamResult .= '</tbody></table></div></div>';
            
            return $this->aStreamResult;     
            
        }
        
        
        public function GetOnlyService($pIDServices){
            
            $this->aStreamResult = '';
            
            $this->aStreamSQL = " select idservices, title_en, content_en, icon  ".
                                " from omicron.services ".
                                " where idservices=".$pIDServices;
            
            //echo $this->aStreamSQL;
                
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            while ($row = mysqli_fetch_array($result)) 
            {
                     
                $this->aStreamResult  = '<div class="col-md-6">';
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>id</label>';
                $this->aStreamResult .= '<input name="txtId" value="'.$row['idservices'].'" class="form-control" disabled/>';
                $this->aStreamResult .= '</div> ';
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>Title</label>';
                $this->aStreamResult .= '<input name="txtTitle" value="'.$row['title_en'].'" class="form-control" disabled/>';
                $this->aStreamResult .= '</div> ';
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>Content</label>';
                $this->aStreamResult .= '<input name="txtContent" value="'.$row['content_en'].'" class="form-control" disabled/>';
                $this->aStreamResult .= '</div> ';
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>Icon</label>';
                $this->aStreamResult .= '<input name="txtIcon" value="'.$row['icon'].'" class="form-control" disabled/>';
                $this->aStreamResult .= '</div> ';
                
                $this->aStreamResult .= '<div class="form-actions">';
                $this->aStreamResult .= '<button type="submit" class="btn btn-danger">Delete</button> &nbsp;';
                $this->aStreamResult .= '<a class="btn btn-success" href="adminServices.php">Back</a>';
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
