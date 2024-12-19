
<a href="?controller=productOrder&action=index">productOrderUPPP</a>


<form method="get" action="">
    <label> productOrderId   <input type="text" name="productOrderId"         value="<?php echo $productOrder->productOrderId ;  ?>"/>        </label><br>
    <label> purchaseDate     <input type="date" name="purchaseDate"       value="<?php echo $productOrder->purchaseDate; ?>"/>        </label><br>
    <label> amount           <input type="text" name="amount"             value="<?php echo $productOrder->amount ; ?>"/>            </label><br>
    

    
    <label> product <select name="productId">    
        <?php
            foreach($serviceProduct_list as $p)
            {   echo "<option value = $p->productId";
                if($p->productId==$productOrder->productId){echo " selected='selected'";}
                echo ">$p->productName</option>";}
        ?>
    </select></label><br>
    
    
    <label> customer<select name="customerId">    
        <?php
            foreach($customer_list as $c)
            {   echo "<option value = $c->customerId";
                if($c->customerId==$productOrder->customerId){echo " selected='selected'";}
                echo ">$c->name</option>";}
        ?>
    </select></label><br>

    
    <label> Staff <select name="staffId">    
        <?php
            foreach($staff_list as $s)
            {   echo "<option value = $s->staffId";
                if($s->staffId==$productOrder->staffId){echo " selected='selected'";}
                echo">$s->name</option>";}
        ?>
    </select></label><br>



    <input type="hidden" name="controller" value ="productOrder" />
    <button type="submit" name="action" value="index">Back </button>
    <button type="submit" name="action" value="update">update</button>
</form>