<form method="get" action="">
        <input type ="text" name="key">
        <input type ="hidden" name="controller" value="serviceProduct">
        <button type ="submit" name="action" value="searchServiceProduct">
                Search
        </button>
</form>


<a href="?controller=serviceProduct&action=newServiceProduct">AddServiceProduct</a>

<table border = 1>
    <tr><td> productId </td> <td> productName </td> <td> price </td><td> serviceOwner </td><td> serviceType</td> <td>Update</td><td>delete</td></tr>
<?php foreach($serviceProduct_List as $p)
{    
    echo "<tr><td> $p->productId </td> <td> $p->productName </td> <td> $p->price </td><td> $p->serviceOwnerName </td> <td> $p->serviceTypeName </td> <td><a href=?controller=serviceProduct&action=updateForm&productId=$p->productId>update </a></td> <td><a href=?controller=serviceProduct&action=confirmDelete&productId=$p->productId>delete </a></td></tr>";
}
echo "</table>";

?>