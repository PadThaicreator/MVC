<?php
        echo "<br>Are you sure to delete this staff <br> <br>ID: $serviceProduct->productId  Name: $serviceProduct->productName  Price: $serviceProduct->price Owner: $serviceProduct->serviceOwnerName<br>"

?>


<form method="get" action="">
    <input type="hidden" name="controller" value ="serviceProduct" />
    <input type="hidden" name="productId" value ="<?php echo $serviceProduct->productId ?>" />
    <button type="submit" name="action" value="index">Back </button>
    <button type="submit" name="action" value="delete">delete </button>
</form>