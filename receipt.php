<h1>Order Confirmation</h1>

<?php
    require_once('./database.php');

    //obtain teh address, card number, and the cart entries
    $address = $_POST["street"].' '.$_POST["city"].' '.$_POST["state"].", ".$_POST["zip"]." ".$_POST["country"];
    $card = $_POST["cc"];
    $cart = $myDatabaseFunctions->getShoppingCart($_SESSION["User"]["User_Name"]);

    //add all the cart entries to the transactions
    $myDatabaseFunctions->addTransactions($cart,$address,$card);

    //remove the items from the cart.
    foreach($cart as $item){
        $myDatabaseFunctions->removeFromShoppingCart($item["Cart_ID"]);
    }
?>

<h2>Your items will be shipped to: <strong><?=$address?></strong></h2>
<br/>
<h3>
    Your Total is <strong>$<?=$_POST["total"]?></strong> and has been charged to the credit card number
    <strong><?=$card?></strong>.
</h3>
