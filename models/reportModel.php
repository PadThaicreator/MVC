<?php   class Report{

public $typeCus , $serviceType , $totalOrder , $totalPrice,$month ,$year;

public function __construct($typeCus , $serviceType , $totalOrder , $totalPrice,$month ,$year)
{   
    $this->	typeCus             = $typeCus ;
    $this->	serviceType         = $serviceType ;
    $this->	totalOrder          = $totalOrder ;
    $this->	totalPrice          = $totalPrice ;
    $this-> month               = $month;
    $this-> year                = $year;
    
}

public static function showAll()
{   
   // echo "In Function showAll";
    $reportList = [] ;
    
   
    require("connection_connect.php");
    
    
    $sql = "Select YEAR(productOrder.purchaseDate) AS Year, MONTH(productOrder.purchaseDate) AS Month,customerType.typeCusName , serviceType.serviceTypeName , COUNT(*) AS totalOrder , SUM(productOrder.amount*serviceProduct.price) AS totalPrice FROM customerType
            INNER JOIN customer ON customer.typeCusId = customerType.typeCusId
            INNER JOIN productOrder ON productOrder.customerId = customer.customerId
            INNER JOIN serviceProduct ON serviceProduct.productId = productOrder.productId
            INNER JOIN serviceType ON serviceType.serviceTypeId = serviceProduct.serviceTypeId
GROUP BY customerType.typeCusId , serviceType.serviceTypeId , YEAR(productOrder.purchaseDate) , MONTH(productOrder.purchaseDate)
            
ORDER BY YEAR(productOrder.purchaseDate) , MONTH(productOrder.purchaseDate) ";

    $result = $conn->query($sql);



    while($my_row = $result->fetch_assoc())
    {   
        $typeCus         = $my_row['typeCusName'];
        $serviceType     = $my_row['serviceTypeName'];
        $totalOrder      = $my_row['totalOrder'];
        $totalPrice      = $my_row['totalPrice'];
        $month           = $my_row['Month'];
        $year            = $my_row['Year'];
        //echo $typeCus;
        $reportList[] = new Report($typeCus , $serviceType , $totalOrder , $totalPrice,$month ,$year);
    }

    require("connection_close.php");

    return  $reportList;
}



}
?>