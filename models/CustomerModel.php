<?php   class Customer{

public $customerId,$name,$email,$phoneNumber,$typeCusId,$typeCusName;

public function __construct($customerId,$name,$email,$phoneNumber,$typeCusId,$typeCusName)
{   
    $this->	customerId             = $customerId ;
    $this->	name                   = $name ;
    $this->	email                  = $email ;
    $this->	phoneNumber            = $phoneNumber ;
    $this->typeCusId               = $typeCusId ;
    $this->typeCusName             = $typeCusName ;
    
}

public static function getAll()
{   
    
    $customerList = [] ;
    

    require("connection_connect.php");
    
    
    $sql = "select  * from customer inner join customerType on customerType.typeCusId = customer.typeCusId ";
    $result = $conn->query($sql);



    while($my_row = $result->fetch_assoc())
    {   
        $customerId         = $my_row['customerId'];
       
        $name               = $my_row['firstName']." ".$my_row['lastName'];
        $email              = $my_row['email'];
        $phoneNumber        = $my_row['phoneNumber'];
        $typeCusId          = $my_row['typeCusId'];
        $typeCusName        = $my_row['typeCusName'];

       
        
        $customerList[] = new Customer($customerId,$name,$email,$phoneNumber,$typeCusId,$typeCusName);
    }

    require("connection_close.php");

    return  $customerList;
}



}
?>