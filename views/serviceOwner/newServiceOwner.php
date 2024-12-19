
<form method="get" action="">
    <label> serviceOwnerId      <input  type="text" name="serviceOwnerId"/>         </label><br>
    <label> serviceOwnerName    <input  type="text" name="serviceOwnerName"/>       </label><br>
    <label> phoneNumber         <input  type="text" name="phoneNumber"/>            </label><br>
    <label> email               <input  type="text" name="email"/>                  </label><br>
    
    <input type="hidden" name="controller" value ="serviceOwner" />
    <button type="submit" name="action" value="index">Back </button>
    <button type="submit" name="action" value="addServiceOwner">submit </button>
</form>
