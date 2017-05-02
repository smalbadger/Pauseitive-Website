<?php
    $total = $_POST["total"];
    $user = $_POST["user"];
?>
<h1>Check Out</h1>
<fieldset>
    <div id = "righty">
        <form action="home.php" method="post">
            <h3>Address</h3>
            <label>Street: <input type="text" name="street" required="required"/></label><br/>
            <label>City: <input type="text" name="city" required="required"/></label><br/>
            <label>State: <input type="text" name="state" required="required"/></label><br/>
            <label>ZIP: <input type="text" name="zip" required="required"/></label><br/>
            <label>Country: <input type="text" name="country" required="required"/></label><br/>
            <h3>Billing Information</h3>
            <label>Credit Card Number: <input type="text" name="cc" required="required"/></label><br/>
            <label>CSV Security Code: <input type="text" name="csv" required="required"/></label><br/>
            <label>Expiration Date: <input type="text" name="exp" required="required"/></label><br/>
            <input type="hidden" name="total" value=<?=$total?> required="required"/>
            <input type="hidden" name="type" value="PURCHASE" required="required"/>
            <input type="submit" name="order" value="purchase" required="required"/>
        </form>
    </div>
</fieldset>
