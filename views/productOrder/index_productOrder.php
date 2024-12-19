<form method="get" action="">
        <input type ="text" name="key">
        <input type ="hidden" name="controller" value="productOrder">
        <button type ="submit" name="action" value="searchProductOrder">
                Search
        </button>
</form>


<a href="?controller=productOrder&action=newProductOrder">AddOrder</a>

<table border = 1>
    <tr><td> productOrderId </td> <td> purchaseDate </td> <td> amount </td><td> productName </td><td> customerName </td> <td> staffName </td><td>Update</td><td>delete</td></tr>
<?php foreach($order_List as $o)
{    
    echo "<tr><td> $o->productOrderId </td> <td> $o->purchaseDate </td> <td> $o->amount </td> <td> $o->productName </td> <td> $o->customerName</td>  <td> $o->staffName </td>  <td><a href=?controller=productOrder&action=updateForm&productOrderId=$o->productOrderId>update </a></td> <td><a href=?controller=productOrder&action=confirmDelete&productOrderId=$o->productOrderId>delete </a></td></tr>";
}
echo "</table>";

?>