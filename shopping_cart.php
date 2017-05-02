<?php
    print("<h1>Shopping Cart</h1>");
    require_once('database.php');
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if (isset($_POST["remove"])){
        $myDatabaseFunctions->removeFromShoppingCart($_POST["id"]);

        print('
        <form id="form2" action="home.php" method="post">
            <input type="hidden" name="cart" value="true" />
        </form>

        <script>
            console.log("We are here");
            document.getElementById("form2").submit();
        </script>
        ');
    }
    if(isset($_POST["empty"])){
        $myDatabaseFunctions->EmptyShoppingCart($_SESSION["User"]["User_Name"]);
        print('
        <form id="form1" action="home.php" method="post">
            <input type="hidden" name="cart" value="true" />
        </form>

        <script>
            document.getElementById("form1").submit();
        </script>
        ');
    }

    if (isset($_POST["Buy"])){
        $myDatabaseFunctions->addToShoppingCart($_SESSION["User"]["User_Name"], $_POST["id"]);

        print('
        <form id="form1" action="home.php" method="post">
            <input type="hidden" name="shop" value="true" />
        </form>

        <script>
            document.getElementById("form1").submit();
        </script>
        ');
    }
    else{
        ?>
        <div class = "shopitem">
            <form action="shopping_cart.php" method="post">
                <input type="hidden" name="user" value=<?= $_SESSION['User']['User_Name']?>>
                <input type="submit" name="empty" value="Empty Cart">
            </form>
        </div>
        <?php
        $total = 0.00;
        $shopping_cart = $myDatabaseFunctions->getShoppingCart($_SESSION["User"]["User_Name"]);
        foreach($shopping_cart as $item){
            $total += $item["Product_Price"];
        ?>
        <br/><br/>

        <div class ="test">
            <img src= <?= $item['Product_Image_Path']?> alt="clothing item" class = "shoppic">
                <div class = "shoptext">
                    <?= $item['Product_Name'] ?>
                    <br>
                    <?= $item['Product_Price']." - " ?><?= $item['Product_Count']?>
                    <br>
                    <form action = "shopping_cart.php" method = "post">
                    <input type = "hidden" name = 'id' value = <?= $item['Cart_ID'] ?>>
                    <input type="submit" name="remove" value="Remove Item"/>
                    </form>
                </div>
            <br>
        </div>
        <br>
        <?php
        }
    }
    ?>
<br>
<div class = "shopitem">
<h3>Total: $<?=$total?></h3>
<form action="home.php" method="post">
    <input type="hidden" name="total" value=<?=$total?>>
    <input type="hidden" name="user" value=<?= $_SESSION['User']['User_Name']?>>
    <?php
    if($myDatabaseFunctions->CartIsEmpty($_SESSION['User']['User_Name'])){
    ?>
        <br/><br/>
        <p>Your shopping cart is empty. </p>
    <?php } else { ?>
        <input type="submit" name="checkout" value="Checkout">
     <?php } ?>
</form>
</div>