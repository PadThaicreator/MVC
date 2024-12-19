<?php

    if(isset($_GET['controller'])&&isset($_GET['action']))
    {
        $controller =$_GET['controller'];
        $action =$_GET['action']  ;
    }
    else
    {
        $controller ='pages';
        $action = 'home';
    }
?>

    <!DOCTYPE html>
    <html>
    <head><title>  MVC </title></head>
    <body>

            <?php echo "controller = $controller, action = $action<br>"; ?>

            <a href="https://bservcpe.eng.kps.ku.ac.th/db24/db24_100/g07/">            <button>GROUP            </button>   </a>
            <a href="?controller=pages&action=home">            <button>home            </button>   </a>
            <a href="?controller=serviceOwner&action=index">    <button>serviceOwner    </button>   </a>
            <a href="?controller=serviceProduct&action=index">  <button>serviceProduct  </button>   </a>
            <a href="?controller=productOrder&action=index">    <button>productOrder    </button>   </a>
            <a href="?controller=report&action=index">          <button>report          </button>   </a><br><br>
            
            <?php require("routes.php"); ?>
            


            

    </body>

    </html>

