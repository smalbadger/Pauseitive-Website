<!DOCTYPE html>
<!--Sam Badger ......... 3/21/2017 -->
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
                                print('<input type="submit" name="report" value="Admin Report"/>');
                                print('<input type="submit" name="manage" value="Manage Products"/>');
                            }
                            else{
                                print('<input type="submit" name="shop" value="Shop Now"/>');
                                print('<input type="submit" name="cart" value="Shopping Cart"/>');
                            }
                            print('<input type="submit" name="logout" value="Log Out"/>');
                        }
                        else{
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
                    //print_r($_SESSION);
                    require_once('./database.php');
                    if(isset($_POST["login"]) || isset($_SESSION["login_failed"])){
                        if (isset($_SESSION["login_failed"])){
                            print("<div id = 'centerit'>Invalid Login. please Try again.</div>");
                            unset($_SESSION["login_failed"]);
                        }
                        require_once("./login.php");
                    }
                    else if(isset($_POST["contact_us"])){
                        require_once("./contact_us.html");
                    }
                    else if(isset($_POST["donate"])){
                        if(isset($_POST["amount"])){
                            print("<h1>Thank you for Donating! It is much appreciated!</h1>");
                            $myDatabaseFunctions->addDonation($_POST["amount"],$_POST["cc"]);
                        }
                        else{
                            require_once("./donate.html");
                        }
                    }
                    else if(isset($_POST["register"])){
                        require_once("./register.php");
                    }
                    else if(isset($_POST["logout"])){
                        print("<h1>Bye, ".$_SESSION["User"]["First_Name"].".</h1>");
                        session_destroy();
                    }
                    else if(isset($_POST["cart"])){
                        require_once("./shopping_cart.php");
                    }
                    else if(isset($_POST["shop"])){
                        require_once("./items.php");
                    }
                    else if(isset($_POST["checkout"])){
                        require_once("./checkout.php");
                    }
                    else if(isset($_POST["order"])){
                        require_once("./receipt.php");
                    }
                    else if (isset($_POST["report"])){
                        require_once('./admin_report.php');
                    }
                    else if (isset($_POST["manage"]) || isset($_POST["remove"]) || isset($_POST["add"])){
                        if(isset($_POST["remove"])){
                            $myDatabaseFunctions->removeProduct($_POST['id']);
                        }
                        else if(isset($_POST["add"])){
                            $myDatabaseFunctions->addProduct($_POST["product_name"],$_POST["price"],$_POST["image_path"]);
                        }
                        require_once('./manage_products.php');
                    }
                    else{
                        require_once('./about_us.html');
                    }
                    for($i = 0; $i < 8; $i += 1){
                        print("<br/>");
                    }
                ?>
                <div id="footer">
                    <div class="left creds">Programmers: Kinsleigh Wong and Sam Badger</div>
                    <div class="mid creds">&copy 2017</div>
                    <div class="right creds">Company Owner: Sam Gardner</div>
                </div>
            </div>
        </div>
    </body>
</html>
