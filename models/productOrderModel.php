<?php   class productOrder{

public $productOrderId,$purchaseDate,$amount,$productName,$productId,$customerName,$customerId,$staffName,$staffId;

public function __construct($productOrderId,$purchaseDate,$amount,$productName,$productId,$customerName,$customerId,$staffName,$staffId)
{   
    $this->productOrderId           = $productOrderId ;
    $this->purchaseDate             = $purchaseDate ;
    $this->amount                   = $amount ;
    $this->productId               = $productId;
    $this->productName              = $productName ;
    $this->customerName             = $customerName ;
    $this->customerId               = $customerId ;
    $this->staffName                = $staffName;
    $this->staffId                  = $staffId;
}

public static function getAll()
{   
    
    $orderList = [] ;
    

    require("connection_connect.php");
    
    
    $sql = "select  * from productOrder inner join serviceProduct on serviceProduct.productId = productOrder.productId INNER JOIN customer ON customer.customerId = productOrder.customerId inner join staff on staff.staffId = productOrder.staffId ";
    $result = $conn->query($sql);



    while($my_row = $result->fetch_assoc())
    {   
        $productOrderId         = $my_row['productOrderId'];
        $purchaseDate           = $my_row['purchaseDate'];
        $amount                 = $my_row['amount'];
        $productName            = $my_row['productName'];
        $productId              = $my_row['productId'];
        $customerName           = $my_row['firstName'] . " " . $my_row['lastName'];
        $customerId             = $my_row['customerId'] ;
        $staffName              = $my_row['staffFirstName']." ".$my_row['staffLastName'] ;
        $staffId                = $my_row['staffId'] ;
        
        //echo $name;
        $orderList[] = new productOrder($productOrderId,$purchaseDate,$amount,$productName,$productId,$customerName,$customerId,$staffName,$staffId);
    }

    require("connection_close.php");

    return  $orderList;
}


public static function add($productOrderId,$purchaseDate,$amount,$productId,$customerId,$staffId)
{
    
    require("connection_connect.php");
    $sql = "insert into productOrder(productOrderId,purchaseDate,amount,productId,customerId,staffId) values('$productOrderId','$purchaseDate','$amount','$productId','$customerId','$staffId')";
    $result = $conn->query($sql);

    require("connection_close.php");

    return  "add success $result rows";
}


public static function search($key)
{      $orderList = [] ;
    
    require("connection_connect.php");
    $sql = "select * from productOrder inner join serviceProduct on serviceProduct.productId = productOrder.productId INNER JOIN customer ON customer.customerId = productOrder.customerId inner join staff on staff.staffId = productOrder.staffId  where (productOrderId like '%$key%' or purchaseDate like '%$key%' or amount like '%$key%' or serviceProduct.productName like '%$key%' or customer.firstName like '%$key%' or customer.lastName like '%$key%' or staff.staffFirstName like '%$key%' or staff.staffLastName like '%$key%')";
    $result = $conn->query($sql);

    

    require("connection_close.php");

    while($my_row = $result->fetch_assoc())
    {   
        $productOrderId         = $my_row['productOrderId'];
        $purchaseDate           = $my_row['purchaseDate'];
        $amount                 = $my_row['amount'];
        $productName            = $my_row['productName'];
        $productId              = $my_row['productId'];
        $customerName           = $my_row['firstName'] . " " . $my_row['lastName'];
        $customerId             = $my_row['customerId'] ;
        $staffName              = $my_row['staffFirstName']." ".$my_row['staffLastName'] ;
        $staffId                = $my_row['staffId'] ;
        //echo $name;
        
        $orderList[] = new productOrder($productOrderId,$purchaseDate,$amount,$productName,$productId,$customerName,$customerId,$staffName,$staffId);
    }

    return $orderList;
}


public static function get($productOrderId)
{
    //echo $productId;
    require("connection_connect.php");
    $sql = "select  * from productOrder inner join serviceProduct on serviceProduct.productId = productOrder.productId INNER JOIN customer ON customer.customerId = productOrder.customerId inner join staff on staff.staffId = productOrder.staffId where productOrder.productOrderId = '$productOrderId' ";
    $result = $conn->query($sql);
    
    $my_row = $result->fetch_assoc();
   
    $productOrderId         = $my_row['productOrderId'];
    $purchaseDate           = $my_row['purchaseDate'];
    $amount                 = $my_row['amount'];
    $productName            = $my_row['productName'];
    $productId              = $my_row['productId'];
    $customerName           = $my_row['firstName'] . " " . $my_row['lastName'];
    $customerId             = $my_row['customerId'] ;
    $staffName              = $my_row['staffFirstName']." ".$my_row['staffLastName'] ;
    $staffId                = $my_row['staffId'] ;
    require("connection_close.php");
   // echo  $productId ;
    return  new productOrder($productOrderId,$purchaseDate,$amount,$productName,$productId,$customerName,$customerId,$staffName,$staffId);
}

public static function update($productOrderId,$purchaseDate,$amount,$productId,$customerId,$staffId)
{
    require("connection_connect.php");
    $sql = "UPDATE productOrder SET purchaseDate='$purchaseDate',amount='$amount',productId='$productId',customerId = '$customerId',staffId = '$staffId' WHERE productOrderId = '$productOrderId'";

    $result = $conn->query($sql);

    require("connection_close.php");

    return  "update success $result rows";
}

public static function delete($productOrderId)
{
    require("connection_connect.php");
    $sql = "DELETE from productOrder WHERE productOrderId = '$productOrderId'";
            
    $result = $conn->query($sql);

    require("connection_close.php");

    return  "delete success $result rows";
}

}
?>