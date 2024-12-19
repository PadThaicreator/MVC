
<form method="get" action="">
    <label> serviceOwnerId <input type="text" name="serviceOwnerId"         value="<?php echo $serviceOwner->serviceOwnerId ;  ?>"/>        </label><br>
    <label> serviceOwnerName <input type="text" name="serviceOwnerName"     value="<?php echo $serviceOwner->serviceOwnerName; ?>"/>        </label><br>
    <label> phoneNumber <input type="text" name="phoneNumber"               value="<?php echo $serviceOwner->phoneNumber ; ?>"/>            </label><br>
    <label> email <input type="text" name="email"                           value="<?php echo $serviceOwner->email ; ?>"/>                  </label><br>

    <input type="hidden" name="controller" value ="serviceOwner" />
    <button type="submit" name="action" value="index">Back </button>
    <button type="submit" name="action" value="update">update </button>
</form>