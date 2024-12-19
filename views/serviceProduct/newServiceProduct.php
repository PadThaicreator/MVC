
<form method="get" action="">
    <label> productId   <input type="text" name="productId"/>       </label><br>
    <label> productName <input type="text" name="productName"/>     </label><br>
    <label> price       <input type="text" name="price"/>           </label><br>
    
    <label> serviceOwner <select name="serviceOwnerId">    
        <?php
            foreach($serviceOwner_list as $p)
            { echo "<option value = $p->serviceOwnerId>$p->serviceOwnerName</option>";}
        ?>
    </select></label><br>


    <label> serviceType <select name="serviceTypeId">    
        <?php
            foreach($serviceType_list as $t)
            { echo "<option value = $t->serviceTypeId>$t->serviceTypeName</option>";}
        ?>
    </select></label><br>


    <input type="hidden" name="controller" value ="serviceProduct" />
    <button type="submit" name="action" value="index">Back </button>
    <button type="submit" name="action" value="addProduct">submit </button>
    </form>
