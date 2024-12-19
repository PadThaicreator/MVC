<form method="get" action="">
        <input type ="text" name="key">
        <input type ="hidden" name="controller" value="serviceOwner">
        <button type ="submit" name="action" value="searchServiceOwner">
                Search
        </button>
</form>


<a href="?controller=serviceOwner&action=newServiceOwner">AddServiceOwner</a>

<table border = 1>
    <tr><td> serviceOwnerId </td> <td> serviceOwnerName </td> <td> phoneNumber </td><td> email </td> <td>Update</td><td>delete</td></tr>
<?php foreach($serviceOwner_List as $s)
{    
    echo "<tr><td> $s->serviceOwnerId </td> <td> $s->serviceOwnerName </td> <td> $s->phoneNumber </td><td> $s->email </td>  <td><a href=?controller=serviceOwner&action=updateForm&serviceOwnerId=$s->serviceOwnerId>update </a></td> <td><a href=?controller=serviceOwner&action=confirmDelete&serviceOwnerId=$s->serviceOwnerId>delete </a></td></tr>";
}
echo "</table>";

?>