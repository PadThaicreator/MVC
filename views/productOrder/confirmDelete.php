<?php
        echo "<br>Are you sure to delete this Order <br> <br>ID: $order->productOrderId  Product: $order->productName Customer: $order->customerName  purchaseDate: $order->purchaseDate<br>"

?>


<form method="get" action="">
    <input type="hidden" name="controller" value ="productOrder" />
    <input type="hidden" name="productOrderId" value ="<?php echo $order->productOrderId ?>" />
    <button type="submit" name="action" value="index">Back </button>
    <button type="submit" name="action" value="delete">delete </button>
</form>