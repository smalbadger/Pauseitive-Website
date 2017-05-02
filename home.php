<!DOCTYPE html>
<!--Sam Badger and Kinsleigh Wong ......... 5/12/2017 -->
<html>
    <head>
        <title>Pauseitive</title>
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <script src="some_js_styles.js" type="text/javascript"></script>
        <script src="prototype.js" type="text/javascript"></script>
        <meta charset="utf-8" />
    </head>
    <body>
        <div id="fixed-bg">
            <nav class = "topall">
                <form action='./home.php' method='POST'>
                    <input type="submit" name="about_us" value="About Us"/>
                    <input type="submit" name="contact_us" value="Contact Us"/>
                    <input type="submit" name="donate" value="Donate Today"/>
                    <?php
                        session_start();
                        if(isset($_SESSION["User"]) && !isset($_POST["logout"])){
                            if($_SESSION["User"]["User_Type"] == 'ADMINISTRATOR'){
                                //show these buttons to only the administrator
                                print('<input type="submit" name="report" value="Admin Report"/>');
                                print('<input type="submit" name="manage" value="Manage Products"/>');
                            }
                            else{
                                //show these buttons only to customers who are signed in
                                print('<input type="submit" name="shop" value="Shop Now"/>');
                                print('<input type="submit" name="cart" value="Shopping Cart"/>');
                            }
                            //show logout button only if user is signed in
                            print('<input type="submit" name="logout" value="Log Out"/>');
                        }
                        else{
                            //show login only if user is not signed in
                            print('<input type="submit" name="login" value="Log In"/>');
                            print('<input type="submit" name="register" value="Register"/>');
                        }
                    ?>
                </form>
            </nav>
            <div id="main">

                <header>
                    <img src="pauseitive.svg" alt="pauseitive"/>
                </header>

                <?php
                    require_once('./database.php');

                    //if the login button is pressed or if the login failed.
                    if(isset($_POST["login"]) || isset($_SESSION["login_failed"])){
                        //if the login failed, print an error message
                        if (isset($_SESSION["login_failed"])){
                            print("<div id = 'centerit'>Invalid Login. please Try again.</div>");
                            unset($_SESSION["login_failed"]);
                        }
                        require_once("./login.php");
                    }

                    //if contact us button is pressed
                    else if(isset($_POST["contact_us"])){
                        require_once("./contact_us.html");
                    }

                    //if donate button is pressed, or an amount of money has already been donated
                    else if(isset($_POST["donate"])){

                        //if they already donated, show this message and log the donation in the transaction table
                        if(isset($_POST["amount"])){
                            print("<h1>Thank you for Donating! It is much appreciated!</h1>");
                            $myDatabaseFunctions->addDonation($_POST["amount"],$_POST["cc"]);
                        }

                        else{
                            require_once("./donate.html");
                        }
                    }

                    //if register button is pressed
                    else if(isset($_POST["register"])){
                        require_once("./register.php");
                    }

                    //if the logout button is pressed
                    else if(isset($_POST["logout"])){
                        print("<h1>Bye, ".$_SESSION["User"]["First_Name"].".</h1>");
                        session_destroy();
                    }

                    //if the shopping cart button is pressed
                    else if(isset($_POST["cart"])){
                        require_once("./shopping_cart.php");
                    }

                    //if the shop now button is pressed
                    else if(isset($_POST["shop"])){
                        require_once("./items.php");
                    }

                    //if the checkout button is pressed from the shopping cart
                    else if(isset($_POST["checkout"])){
                        require_once("./checkout.php");
                    }

                    //if the order button is pressed from the checkout menu
                    else if(isset($_POST["order"])){
                        require_once("./receipt.php");
                    }

                    //if the admin report button is pressed
                    else if (isset($_POST["report"])){
                        require_once('./admin_report.php');
                    }

                    //if the manage products button is pressed, or the remove or add buttons were pressed within the manage products
                    else if (isset($_POST["manage"]) || isset($_POST["remove"]) || isset($_POST["add"])){

                        //if the remove button is pressed, remove the product from the database.
                        if(isset($_POST["remove"])){
                            $myDatabaseFunctions->removeProduct($_POST['id']);
                        }

                        //if the add button is pressed, add the product to the products table
                        else if(isset($_POST["add"])){
                            $myDatabaseFunctions->addProduct($_POST["product_name"],$_POST["price"],$_POST["image_path"]);
                        }

                        //show the manage menu
                        require_once('./manage_products.php');
                    }

                    //if nothing is pressed, or the about us button is pressed, show about us.
                    else{
                        require_once('./about_us.html');
                    }

                    //print 8 breaks at the end
                    for($i = 0; $i < 8; $i += 1){
                        print("<br/>");
                    }
                ?>

                <!--Give us cred yo-->
                <div id="footer">
                    <div class="left creds">Programmers: Kinsleigh Wong and Sam Badger</div>
                    <div class="mid creds">&copy 2017</div>
                    <div class="right creds">Company Owner: Sam Gardner</div>
                </div>
            </div>
        </div>
    </body>
</html>
