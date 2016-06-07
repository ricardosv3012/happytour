<?php
//показать ощибки
    error_reporting(E_ALL);	
    ini_set('display_errors', '1');

    include 'layerPersistence/serviceConnection.php';
    
    class ProcessAdminUsers{
        
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
        
        
        public function ProcessAdminUsers(){

            $this->aDBService = new ServiceMysql();
           
            //start conection
            $this->aDBService->SetUserMySql();
           
            $this->saStreamSQL = '';
           
        }
        
        
        public function ReadUsers(){
            
            $this->aStreamResult = '';
            
            $this->aStreamSQL = " select idusers, firtname, lastname, login, password, ".
                                " numberphone,email, image,enabled ".
                                " from omicron.users where enabled = 'S'; ";
                              
            //echo $this->aStreamSQL;
                
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            $this->aStreamResult  = '<div class="tab-pane fade active in" id="home"> ';
            $this->aStreamResult .= '<div class="table-responsive">';
            $this->aStreamResult .= '<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
            $this->aStreamResult .= '<thead><tr><th>id</th><th>FirsName</th><th>LastName</th><th>Login</th>';
            $this->aStreamResult .= '<th>Password</th><th>Phone</th><th>Email</th><th>Edition</th><th>Delete</th></tr></thead>';
            $this->aStreamResult .= '<tbody>';
                  
            
            while ($row = mysqli_fetch_array($result)) 
            {
                $this->aStreamResult .= '<tr> ';
                $this->aStreamResult .= '<td>'.$row['idusers'].'</td>';
                $this->aStreamResult .= '<td>'.$row['firtname'].'</td>';
                $this->aStreamResult .= '<td>'.$row['lastname'].'</td>';
                $this->aStreamResult .= '<td>'.$row['login'].'</td>';
                $this->aStreamResult .= '<td>'.$row['password'].'</td>';
                $this->aStreamResult .= '<td>'.$row['numberphone'].'</td>';
                $this->aStreamResult .= '<td>'.$row['email'].'</td>';
                $this->aStreamResult .= '<td><a class="btn btn-warning"  href="adminUsersUpdate.php?idUsers='.$row['idusers'].'">Update</a></td>';
                $this->aStreamResult .= '<td><a class="btn btn-danger"   href="adminUsersDelete.php?idUsers='.$row['idusers'].'">Delete</a></td>';
                $this->aStreamResult .= '</tr>';
                                  
            } 
            
            $this->aStreamResult .= '</tbody></table></div></div>';
            
            return $this->aStreamResult;     
            
        }
        
        
        public function GetOnlyUser($pIDUser){
            
            $this->aStreamResult = '';
            
            $this->aStreamSQL = " select idusers, firtname, lastname,  ".
                                " login, password, numberphone, email ".
                                " from omicron.users ".
                                " where idusers=".$pIDUser;
            
            //echo $this->aStreamSQL;
                
            //EXECUTE QUERY
            $result = $this->aDBService->ExecuteMySQL($this->aStreamSQL);
            
            while ($row = mysqli_fetch_array($result)) 
            {
                     
                $this->aStreamResult  = '<div class="col-md-6">';
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>id</label>';
                $this->aStreamResult .= '<input name="txtId" value="'.$row['idusers'].'" class="form-control" />';
                $this->aStreamResult .= '</div> ';
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>First Name</label>';
                $this->aStreamResult .= '<input name="txtFirstName" value="'.$row['firtname'].'" class="form-control" />';
                $this->aStreamResult .= '</div> ';
                
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>Last Name</label>';
                $this->aStreamResult .= '<input name="txtLastName" value="'.$row['lastname'].'" class="form-control" />';
                $this->aStreamResult .= '</div> ';
                
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>Login</label>';
                $this->aStreamResult .= '<input name="txtLogin" value="'.$row['login'].'" class="form-control" />';
                $this->aStreamResult .= '</div> ';
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>Password</label>';
                $this->aStreamResult .= '<input type="password" name="txtPass" value="'.$row['password'].'" class="form-control" />';
                $this->aStreamResult .= '</div> ';
                
                $this->aStreamResult .= '<div class="form-actions">';
                $this->aStreamResult .= '<button type="submit" class="btn btn-danger">Update</button> &nbsp;';
                $this->aStreamResult .= '<a class="btn btn-success" href="adminUsers.php">Back</a>';
                $this->aStreamResult .= '</div>';
                
                $this->aStreamResult .= '</div>';
                $this->aStreamResult .= '<div class="col-md-6">';
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>Phone</label>';
                $this->aStreamResult .= '<input name="txtPhone" value="'.$row['numberphone'].'" class="form-control" />';
                $this->aStreamResult .= '</div> ';
                
                $this->aStreamResult .= '<div class="form-group">';
                $this->aStreamResult .= '<label>Mail</label>';
                $this->aStreamResult .= '<input name="txtMail" value="'.$row['email'].'" class="form-control" />';
                $this->aStreamResult .= '</div> ';
                
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
