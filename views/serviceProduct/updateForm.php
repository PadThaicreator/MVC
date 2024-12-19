
<?php
    echo "Call updateForm" ;
?>


<form method="get" action="">
    <label> productId       <input type="text" name="productId"         value="<?php echo $serviceProduct->productId ;  ?>"/>        </label><br>
    <label> productName     <input type="text" name="productName"       value="<?php echo $serviceProduct->productName; ?>"/>        </label><br>
    <label> price           <input type="text" name="price"             value="<?php echo $serviceProduct->price ; ?>"/>            </label><br>
    <label> serviceOwner    <select name="serviceOwnerId">    
        <?php
            foreach($serviceOwner_list as $s)
            {   echo "<option value = $s->serviceOwnerId";
                if($s->serviceOwnerId==$serviceProduct->serviceOwnerId){echo " selected='selected'";}
                echo ">$s->serviceOwnerName</option>";}
        ?>
    </select></label><br>

     <label> serviceType    <select name="serviceTypeId">    
        <?php
            foreach($serviceType_list as $t)
            {   echo "<option value = $t->serviceTypeId";
                if($t->serviceTypeId==$serviceProduct->serviceTypeId){echo " selected='selected'";}
                echo ">$t->serviceTypeName</option>";}
        ?>
    </select></label><br>

    <input type="hidden" name="controller" value ="serviceProduct" />
    <button type="submit" name="action" value="index">Back </button>
    <button type="submit" name="action" value="update">update </button>
</form>