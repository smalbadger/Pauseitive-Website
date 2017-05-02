<?php
    $total = $_POST["total"];
    $user = $_POST["user"];
?>
<h1>Check Out</h1>
<form action="home.php" method="post">
<fieldset class="purchaseContainer2">
            <h3>Address</h3>
            <label class = "heading" for = "street">Street:</label>
            <input type="text" name="street" required="required"/>
            <br/>
            <label class = "heading" for = "city">City:</label>
            <input type="text" name="city" required="required"/>
            <br/>
            <label class = "heading" for = "state">State:</label>
            <input type="text" name="state" required="required"/>
            <br/>
            <label class = "heading" for="zip">ZIP:</label>
            <input type="text" name="zip" required="required"/>
            <br/>
            <label class = "heading" for="country">Country:</label>
            <input type="text" name="country" required="required"/>
            <br/>

            <h3>Billing Information</h3>
            <label class = "heading" for="cc">Credit Card Number:</label>
            <input type="text" name="cc" required="required"/>
            <br/>
            <label class = "heading" for="csv">CSV Security Code:</label>
			<input type="text" name="csv" required="required"/>
            <br/>
            <label class = "heading" for="exp">Expiration Date: </label>
			<input type="text" name="exp" required="required"/>
            <br/>
            <input type="hidden" name="total" value=<?=$total?>>
            <input type="hidden" name="type" value="PURCHASE" required="required"/>
            <div class="buttonsubmit"> <input type="submit" name="order" value="Purchase"/> </div>
</fieldset>
</form>
