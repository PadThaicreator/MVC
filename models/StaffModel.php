<?php   class Staff{

public $staffId,$name,$position,$branchId;

public function __construct($staffId,$name,$position,$branchId)
{   
    $this->	staffId             = $staffId ;
    $this->	name                = $name ;
    $this->	position            = $position ;
    $this->	branchId            = $branchId ;
 
    
}

public static function getAll()
{   
    
    $satffList = [] ;
    

    require("connection_connect.php");
    
    
    $sql = "select  * from staff inner join branch on staff.branchId = branch.branchId ";
    $result = $conn->query($sql);



    while($my_row = $result->fetch_assoc())
    {   
        $staffId         = $my_row['staffId'];
        $name            = $my_row['staffFirstName']." ".$my_row['staffLastName'];
        $position        = $my_row['position'];
        $branchId        = $my_row['branchId'];
       
       

       
        
        $staffList[] = new Staff($staffId,$name,$position,$branchId);
    }

    require("connection_close.php");

    return  $staffList;
}



}
?>