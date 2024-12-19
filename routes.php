<?php

$controllers = array('pages'=>['home','error'],'serviceOwner'=>['index','newServiceOwner','addServiceOwner','searchServiceOwner','updateForm','update','confirmDelete','delete'],'serviceProduct'=>['index','addProduct','newServiceProduct','searchServiceProduct','updateForm','update','confirmDelete','delete'],'productOrder'=>['index','newProductOrder','addOrder','searchProductOrder','updateForm','update','confirmDelete','delete'],'report'=>['index']);


function call($controller,$action)
{   
    require("controllers/".$controller."_controller.php");
    
    switch($controller)
    {
        case "pages":           $controller_obj = new PagesController();
                                break ;
        case "serviceOwner":    require_once("models/serviceOwnerModel.php");
                                $controller_obj = new serviceOwnerController();
                                break ;
        case "serviceProduct":  require_once("models/serviceProductModel.php");
                                require_once("models/serviceOwnerModel.php");
                                require_once("models/serviceTypeModel.php");
                                $controller_obj = new serviceProductController();
                                break ;
        case "productOrder":    require_once("models/productOrderModel.php");
                                require_once("models/serviceProductModel.php");
                                require_once("models/CustomerModel.php");
                                require_once("models/StaffModel.php");
                                $controller_obj = new productOrderController();
                                break ; 
        case "report":          require_once("models/reportModel.php");
                                $controller_obj = new reportController();
                                break ; 

    }

    $controller_obj->{$action}();
}

if(array_key_exists($controller,$controllers))
{
    if(in_array($action,$controllers[$controller]))
    {   call($controller,$action); }
    else
    {   call('pages','error');  }
}
else
{   call('pages','error');  }

?>