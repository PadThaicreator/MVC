<?php  
class serviceOwnerController
{
    public function index()
    {   
        //echo "call index Service" ;
        $serviceOwner_List = serviceOwner::getAll();
        //echo "call getAll" ;
        require_once('views/serviceOwner/index_serviceOwner.php'); 
    }
    public function newServiceOwner()
    {
        //echo "call index Service" ;
        require_once("views/serviceOwner/newServiceOwner.php");
    }

    public function addServiceOwner()
    {
        $serviceOwnerId    =  $_GET['serviceOwnerId']; 
        $serviceOwnerName  =  $_GET['serviceOwnerName']; 
        $phoneNumber   =  $_GET['phoneNumber']; 
        $email   =  $_GET['email']; 
        serviceOwner::add($serviceOwnerId,$serviceOwnerName,$phoneNumber,$email);
        serviceOwnerController::index();
    }

    public function searchServiceOwner()
    {   //echo "call searchServiceOwner" ;
        $key    =  $_GET['key']; 
        
        $serviceOwner_List = serviceOwner::search($key);
        
        require_once('views/serviceOwner/index_serviceOwner.php'); 
    }

    public function updateForm()
    {
        //echo "call updateForm  " ;
        $serviceOwnerId = $_GET['serviceOwnerId'];
        $serviceOwner = serviceOwner::get($serviceOwnerId);
    
    require_once('views/serviceOwner/updateForm.php');
   
    }

    public function update()
    {
        $serviceOwnerId    =  $_GET['serviceOwnerId']; 
        $serviceOwnerName  =  $_GET['serviceOwnerName']; 
        $phoneNumber       =  $_GET['phoneNumber']; 
        $email             =  $_GET['email']; 
        
        serviceOwner::update($serviceOwnerId,$serviceOwnerName,$phoneNumber,$email);
        serviceOwnerController::index();
    }

    
    public function confirmDelete()
    {   //echo "call confirmDelete  " ;
        $serviceOwnerId = $_GET['serviceOwnerId'];
        $s=serviceOwner::get($serviceOwnerId);
      
        require_once('views/serviceOwner/confirmDelete.php');
    }

    public function delete()
    {
        $serviceOwnerId = $_GET['serviceOwnerId'];
        serviceOwner::delete($serviceOwnerId);
        serviceOwnerController::index();
    }
   
}
?>