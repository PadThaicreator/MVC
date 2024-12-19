<?php   class serviceProduct{

public $productId,$productName,$price,$serviceOwnerId,$serviceOwnerName,$serviceTypeId,$serviceTypeName;

public function __construct($productId,$productName,$price,$serviceOwnerId,$serviceOwnerName,$serviceTypeId,$serviceTypeName)
{   
    $this->productId           = $productId ;
    $this->productName         = $productName ;
    $this->price               = $price ;
    $this->serviceOwnerId      = $serviceOwnerId ;
    $this->serviceOwnerName    = $serviceOwnerName ;
    $this->serviceTypeId       = $serviceTypeId;
    $this->serviceTypeName     = $serviceTypeName;
}

public static function getAll()
{   
    $serviceList = [] ;
    //echo  "In getAll Product Model";
    require("connection_connect.php");
    
    $sql = "select * from serviceProduct inner join serviceOwner on serviceOwner.serviceOwnerId = serviceProduct.serviceOwnerId inner join serviceType on serviceType.serviceTypeId = serviceProduct.serviceTypeId";
    $result = $conn->query($sql);

    while($my_row = $result->fetch_assoc())
    {   
        $productId          = $my_row['productId'];
        $productName        = $my_row['productName'];
        $price              = $my_row['price'];
        $serviceOwnerId     = $my_row['serviceOwnerId'];
        $serviceOwnerName   = $my_row['serviceOwnerName'];
        $serviceTypeId      = $my_row['serviceTypeId'];
        $serviceTypeName    = $my_row['serviceTypeName'];
        
        $serviceList[] = new serviceProduct($productId,$productName,$price,$serviceOwnerId,$serviceOwnerName,$serviceTypeId,$serviceTypeName);
    }

    require("connection_close.php");

    return  $serviceList;
}


public static function add($productId,$productName,$price,$serviceOwnerId,$serviceTypeId)
{
    
    require("connection_connect.php");
    $sql = "insert into serviceProduct(productId,productName,price,serviceOwnerId,serviceTypeId) values ('$productId','$productName','$price','$serviceOwnerId','$serviceTypeId')";
    $result = $conn->query($sql);

    require("connection_close.php");

    return  "add success $result rows";
}

public static function search($key)
{      $serviceProduct = [] ;
    
    require("connection_connect.php");
    $sql = "select * from serviceProduct inner join  serviceOwner on serviceOwner.serviceOwnerId = serviceProduct.serviceOwnerId inner join serviceType on serviceType.serviceTypeId = serviceProduct.serviceTypeId  where (productId like '%$key%' or productName like '%$key%' or price like '%$key%' or serviceOwner.serviceOwnerId like '%$key%' or serviceOwner.serviceOwnerName like '%$key%' )";
    $result = $conn->query($sql);

    

    require("connection_close.php");

    while($my_row = $result->fetch_assoc())
    {   
        $productId          = $my_row['productId'];
        $productName        = $my_row['productName'];
        $price              = $my_row['price'];
        $serviceOwnerId     = $my_row['serviceOwnerId'];
        $serviceOwnerName   = $my_row['serviceOwnerName'];
        $serviceTypeId      = $my_row['serviceTypeId'];
        $serviceTypeName    = $my_row['serviceTypeName'];
        //echo $productName ;
        $serviceProduct[] = new serviceProduct($productId,$productName,$price,$serviceOwnerId,$serviceOwnerName,$serviceTypeId,$serviceTypeName);
    }

    return $serviceProduct;
}



public static function get($productId)
{
    //echo $productId;
    require("connection_connect.php");
    $sql = "select * from serviceProduct inner join  serviceOwner on serviceOwner.serviceOwnerId = serviceProduct.serviceOwnerId inner join serviceType on serviceType.serviceTypeId = serviceProduct.serviceTypeId where serviceProduct.productId = '$productId'";
    $result = $conn->query($sql);
    
    $my_row = $result->fetch_assoc();
   
    $productId          = $my_row['productId'];
    $productName        = $my_row['productName'];
    $price              = $my_row['price'];
    $serviceOwnerId     = $my_row['serviceOwnerId'];
    $serviceOwnerName   = $my_row['serviceOwnerName'];
    $serviceTypeId      = $my_row['serviceTypeId'];
    $serviceTypeName    = $my_row['serviceTypeName'];
    //echo $productName;
    require("connection_close.php");

    return  new serviceProduct($productId,$productName,$price,$serviceOwnerId,$serviceOwnerName,$serviceTypeId,$serviceTypeName);
}


public static function update($productId,$productName,$price,$serviceOwnerId,$serviceTypeId)
{
    require("connection_connect.php");
    $sql = "UPDATE serviceProduct SET productName='$productName',price='$price',serviceOwnerId='$serviceOwnerId',serviceTypeId = '$serviceTypeId' WHERE productId = '$productId'";

    $result = $conn->query($sql);

    require("connection_close.php");

    return  "update success $result rows";
}

public static function delete($productId)
{
    require("connection_connect.php");
    $sql = "DELETE from serviceProduct WHERE productId = '$productId'";
            
    $result = $conn->query($sql);

    require("connection_close.php");

    return  "Delete success $result rows";
}

}
?>