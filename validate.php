<?php
    require_once("database.php");
    session_start();
    $DB = new DatabaseAdapter();
    $user = $DB->getUser($_POST["username"]);

    if( isset($_POST['register'])){
        //be sure to validate and clean your variables
        $first = htmlentities($_POST['firstname']);
        $last = htmlentities($_POST['lastname']);
        $phone = htmlentities($_POST['phone']);
        $email = htmlentities($_POST['email']);
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);

        $password = password_hash($password,PASSWORD_DEFAULT);

        if (isset($_POST['type'])){
            $type = "ADMINISTRATOR";
        }
        else{
            $type = "CUSTOMER";
        }

        //then you can use them in a PHP function.
        $DB->add_user( $first, $last, $phone, $email, $username, $password, $type);
        $user = $DB->getUser($_POST["username"],$_POST["password"]);
        $_SESSION["User"] = $user[0];
    }

    else{
        if(isset($user[0]["User_Name"])){
            print($user[0]["Hashed_Password"]);
            print($_POST['password']);
            print(password_hash($_POST['password']));
            if(password_verify($_POST['password'],$user[0]["User_Hashed_Password"])){

                $_SESSION["User"]=$user[0];
                print("Welcome, " . $_SESSION["User"]["User_Name"]);
                if (isset($_SESSION["login_failed"])){
                    unset($_SESSION["login_failed"]);
                }
            }
            else{
                $_SESSION["login_failed"] = 1;
            }
        }
        else{
            $_SESSION["login_failed"] = 1;
        }
    }
    header('Location: ./home.php');
?>
