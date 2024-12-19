
<form method="get" action="">
    <label> productOrderId      <input type="text" name="productOrderId"/>   </label><br>
    <label> purchaseDate        <input type="date" name="purchaseDate"/>     </label><br>
    <label> amount              <input type="text" name="amount"/>           </label><br>
    
    
    <label> product <select name="productId">    
        <?php
            foreach($product_list as $p)
            { echo "<option value = $p->productId>$p->productName</option>";}
        ?>
    </select></label><br>


    <label> Customer <select name="customerId">    
        <?php
            foreach($customer_list as $c)
            { echo "<option value = $c->customerId >$c->name</option>";}
        ?>
    </select></label><br>

    <label> Staff <select name="staffId">    
        <?php
            foreach($staff_list as $s)
            { echo "<option value = $s->staffId >$s->name</option>";}
        ?>
    </select></label><br>

    <input type="hidden" name="controller" value ="productOrder" />
    <button type="submit" name="action" value="index">Back </button>
    <button type="submit" name="action" value="addOrder">submit </button>
    </form>
