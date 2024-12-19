<?php
        echo "<br>Are you sure to delete this staff <br> <br>ID: $s->serviceOwnerId  Name: $s->serviceOwnerName  Phone: $s->phoneNumber Email: $s->email<br>"

?>


<form method="get" action="">
    <input type="hidden" name="controller" value ="serviceOwner" />
    <input type="hidden" name="serviceOwnerId" value ="<?php echo $s->serviceOwnerId ?>" />
    <button type="submit" name="action" value="index">Back </button>
    <button type="submit" name="action" value="delete">delete </button>
</form>