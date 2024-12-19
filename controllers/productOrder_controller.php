<?php

//echo "Call controller Order" ;
class productOrderController
{
    public function index()
    {   
        //echo "call index order" ;
        $order_List = productOrder::getAll();
        //echo "NAME :".$order_List[2]->name.$order_List[2]->productName  ;
        
        require_once('views/productOrder/index_productOrder.php'); 
    }

    public function newProductOrder()
    {   //echo "call newOrder" ;
        $customer_list  = Customer::getAll();
        $product_list   = serviceProduct::getAll();
        $staff_list   = Staff::getAll();
        //echo  "In  newProductOrder";
        //echo "call Getall" ;
        require_once("views/productOrder/newProductOrder.php");
    }

    public function addOrder()
    {   
        $productOrderId      =  $_GET['productOrderId']; 
        $purchaseDate        =  $_GET['purchaseDate']; 
        $amount              =  $_GET['amount']; 
        $productId           =  $_GET['productId']; 
        $customerId          =  $_GET['customerId']; 
        $staffId             =  $_GET['staffId'];
        //echo "IN addOrder ";
        //echo "Product ID $productId";
        productOrder::add($productOrderId,$purchaseDate,$amount,$productId,$customerId,$staffId);
        //echo "after add Model";
        productOrderController::index();
        
    }
    public function searchProductOrder()
    {
        $key    =  $_GET['key']; 
        //echo "call Action Search order" ;
        $order_List = productOrder::search($key);
        //echo "call Search Key" ;
        require_once('views/productOrder/index_productOrder.php'); 
    }

    
    public function updateForm()
    {
       // echo "call updateForm Product" ;
        $productOrderId = $_GET['productOrderId'];

        $serviceProduct_list = serviceProduct::getAll();
        $customer_list = Customer::getAll();
        $staff_list   = Staff::getAll();
       // echo "call getAll UpdateForm" ;
        
       // echo "Product : $productOrderId" ;
        $productOrder = productOrder::get($productOrderId);
       // echo "Product : $productOrder->productId" ;
       // echo "Product : $productOrder->staffName" ;
        require_once('views/productOrder/updateForm.php');
   
    }

    
    public function update()
    {
        $productOrderId     =  $_GET['productOrderId']; 
        $purchaseDate       =  $_GET['purchaseDate']; 
        $amount             =  $_GET['amount']; 
        $productId          =  $_GET['productId']; 
        $customerId         =  $_GET['customerId']; 
        $staffId            =  $_GET['staffId']; 
        productOrder::update($productOrderId,$purchaseDate,$amount,$productId,$customerId,$staffId);
        productOrderController::index();
    }

    
    public function confirmDelete()
    {   //echo "call confirmDelete  " ;
        $productOrderId = $_GET['productOrderId'];
        $order=productOrder::get($productOrderId);
      
        require_once('views/productOrder/confirmDelete.php');
    }

    public function delete()
    {
        $productOrderId = $_GET['productOrderId'];
        productOrder::delete($productOrderId);
        productOrderController::index();
    }

}
?>