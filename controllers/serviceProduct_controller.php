<?php
class serviceProductController
{
    public function index()
    {   
        //echo "call index Service" ;
        $serviceProduct_List = serviceProduct::getAll();
        //echo "call getAll" ;
        require_once('views/serviceProduct/index_serviceProduct.php'); 
    }
    public function newServiceProduct()
    {   $serviceOwner_list = serviceOwner::getAll();
        $serviceType_list = serviceType::getAll();
        require_once("views/serviceProduct/newServiceProduct.php");
    }
    public function addProduct()
    {   //echo "Hello add";
        $productId          =  $_GET['productId']; 
        $productName        =  $_GET['productName']; 
        $price              =  $_GET['price']; 
        $serviceOwnerId     =  $_GET['serviceOwnerId']; 
        $serviceTypeId      =  $_GET['serviceTypeId'];
        serviceProduct::add($productId,$productName,$price,$serviceOwnerId,$serviceTypeId );
        serviceProductController::index();
    }


    public function searchServiceProduct()
    {
        $key    =  $_GET['key']; 
        
        $serviceProduct_List = serviceProduct::search($key);
        
        require_once('views/serviceProduct/index_serviceProduct.php'); 
    }


    public function updateForm()
    {
       // echo "call updateForm Product" ;
        $productId = $_GET['productId'];

        $serviceOwner_list = serviceOwner::getAll();
        //echo "call getAll Owner" ;
        $serviceProduct = serviceProduct::get($productId);
        $serviceType_list = serviceType::getAll();
        //echo "call get Product" ;
        require_once('views/serviceProduct/updateForm.php');
   
    }

    public function update()
    {
        $productId          =  $_GET['productId']; 
        $productName        =  $_GET['productName']; 
        $price              =  $_GET['price']; 
        $serviceOwnerId     =  $_GET['serviceOwnerId']; 
        $serviceTypeId      =  $_GET['serviceTypeId'];
        serviceProduct::update($productId,$productName,$price,$serviceOwnerId,$serviceTypeId);
        serviceProductController::index();
    }

    
    public function confirmDelete()
    {   //echo "call confirmDelete  " ;
        $productId = $_GET['productId'];
        $serviceProduct=serviceProduct::get($productId);
      
        require_once('views/serviceProduct/confirmDelete.php');
    }

    public function delete()
    {
        $productId = $_GET['productId'];
        serviceProduct::delete($productId);
        serviceProductController::index();
    }

}
?>