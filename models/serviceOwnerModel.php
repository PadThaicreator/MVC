<?php   class serviceOwner{

public $serviceOwnerId,$serviceOwnerName,$phoneNumber,$email;

public function __construct($serviceOwnerId,$serviceOwnerName,$phoneNumber,$email)
{   
    $this->serviceOwnerId   = $serviceOwnerId ;
    $this->serviceOwnerName = $serviceOwnerName ;
    $this->phoneNumber      = $phoneNumber ;
    $this->email            = $email ;
}

public static function getAll()
{   
    
    $serviceOwnerList = [] ;
    //echo "IN getAll ";

    require("connection_connect.php");
    
    
    $sql = "select * from serviceOwner";
    $result = $conn->query($sql);

    //echo "IN SQL ";

    while($my_row = $result->fetch_assoc())
    {   
        $serviceOwnerId  = $my_row['serviceOwnerId'];
        $serviceOwnerName = $my_row['serviceOwnerName'];
        $phoneNumber = $my_row['phoneNumber'];
        $email = $my_row['email'];
       

        $serviceOwnerList[] = new serviceOwner($serviceOwnerId,$serviceOwnerName,$phoneNumber,$email);
    }

    require("connection_close.php");

    return  $serviceOwnerList;
}


public static function add($serviceOwnerId,$serviceOwnerName,$phoneNumber,$email)
{
    
    require("connection_connect.php");
    $sql = "insert into serviceOwner(serviceOwnerId,serviceOwnerName,phoneNumber,email) values ('$serviceOwnerId','$serviceOwnerName','$phoneNumber','$email')";
    $result = $conn->query($sql);

    require("connection_close.php");

    return  "add success $result rows";
}

public static function search($key)
{      $serviceOwner = [] ;
    
    require("connection_connect.php");
    $sql = "select * from serviceOwner  where (serviceOwnerId like '%$key%' or serviceOwnerName like '%$key%' or phoneNumber like '%$key%' or email like '%$key%' )";
    $result = $conn->query($sql);

    

    require("connection_close.php");

    while($my_row = $result->fetch_assoc())
    {   
        $serviceOwnerId     = $my_row[serviceOwnerId];
        $serviceOwnerName   = $my_row[serviceOwnerName];
        $phoneNumber        = $my_row[phoneNumber];
        $email              = $my_row[email];
        
        $serviceOwner[] = new serviceOwner($serviceOwnerId,$serviceOwnerName,$phoneNumber,$email);
    }

    return $serviceOwner;
}

public static function update($serviceOwnerId,$serviceOwnerName,$phoneNumber,$email)
{
    require("connection_connect.php");
    $sql = "UPDATE serviceOwner SET serviceOwnerName='$serviceOwnerName',phoneNumber='$phoneNumber',email='$email' WHERE serviceOwnerId = '$serviceOwnerId'";

    $result = $conn->query($sql);

    require("connection_close.php");

    return  "update success $result rows";
}

public static function get($serviceOwnerId)
{
    
    require("connection_connect.php");
    $sql = "select * from serviceOwner  where serviceOwner.serviceOwnerId = '$serviceOwnerId'";
    $result = $conn->query($sql);

    $my_row = $result->fetch_assoc();
      
    $serviceOwnerId  = $my_row[serviceOwnerId];
    $serviceOwnerName = $my_row[serviceOwnerName];
    $phoneNumber = $my_row[phoneNumber];
    $email = $my_row[email];
  

    require("connection_close.php");

    return  new serviceOwner($serviceOwnerId,$serviceOwnerName,$phoneNumber,$email);
}

public static function delete($serviceOwnerId)
{
    require("connection_connect.php");
    $sql = "DELETE from serviceOwner WHERE serviceOwnerId = '$serviceOwnerId'";
            
    $result = $conn->query($sql);

    require("connection_close.php");

    return  "delete success $result rows";
}


}
?>