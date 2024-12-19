<?php class serviceType{
    
    public $serviceTypeId ,$serviceTypeName;

    public function __construct($serviceTypeId ,$serviceTypeName)
    {
        $this->serviceTypeId    =   $serviceTypeId;
        $this->serviceTypeName  =   $serviceTypeName;
    }

    public static function getAll()
    {
        $serviceTypeList = [];

        require("connection_connect.php");

        $sql = "select * from serviceType";

        $result = $conn->query($sql);

        while($my_row = $result->fetch_assoc())
        {
            $serviceTypeId      =   $my_row[serviceTypeId];
            $serviceTypeName    =   $my_row[serviceTypeName];

            $serviceTypeList[] = new serviceType($serviceTypeId ,$serviceTypeName);
        }

        require("connection_close.php");

        return  $serviceTypeList;
    }




}

?>