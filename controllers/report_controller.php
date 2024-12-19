<?php

//echo "Call controller report" ;
class reportController
{
    public function index()
    {   
        //echo "call index order" ;
        $show_list = Report::showAll();
       
        
        require_once('views/report/index_report.php'); 
    }

}
?>