<?php
    //
    //Author: Sam Badger 4/7/2017
    //Adapted from code by Rick Mercer and the other guy.
    //
    class DatabaseAdapter{
        private $DB;

        //constructs a database adapter
        public function __construct(){
            $user = 'root';
            $password = '';

            try {
                $this->DB = new PDO('mysql:dbname=pauseitive;host=127.0.0.1', $user, $password);
                $this->DB->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e){
                echo('Sam writes: Error establishing Connection!!!!!');
                exit();
            }
        }

        //retrieve the quotes as an array of associate arrays
        public function getUser($username){
            $stmt = $this->DB->prepare("SELECT * FROM users WHERE User_Name = :username");
            $stmt->bindParam( 'username', $username );
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //add a quote to the database
        public function add_user ($first,$last,$phone,$email,$username,$password,$type) {
            $stmt = $this->DB->prepare("INSERT INTO users values(NULL, :username, :firstname, :lastname, :phone, :email, :password, now(),'$type')");
            $stmt->bindParam( 'username', $username );
            $stmt->bindParam( 'firstname', $first );
            $stmt->bindParam( 'lastname', $last );
            $stmt->bindParam( 'phone', $phone );
            $stmt->bindParam( 'email', $email );
	        $stmt->bindParam( 'password', $password );
            $stmt->execute();
        }

        public function getItemsArray() {
            $stmt = $this->DB->prepare ( "SELECT * FROM products");
            $stmt->execute ();
            return $stmt->fetchAll (PDO::FETCH_ASSOC);
        }

        public function addProduct($name, $price, $path){
            $stmt = $this->DB->prepare("SELECT * FROM products WHERE Product_Name=:name;");
            $stmt->bindParam('name',$name);
            $stmt->execute();
            $_SESSION["add_product_check"]=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(strlen($name) > 3 && count($_SESSION["add_product_check"])==0){
                $stmt = $this->DB->prepare ( "INSERT INTO products VALUES(NULL, :name, :price, :image_path, 0);");
                $stmt->bindParam('name',$name);
                $stmt->bindParam('price',$price);
                $stmt->bindParam('image_path',$path);
                $stmt->execute ();
            }
        }

        public function removeProduct($id){
            $stmt = $this->DB->prepare ( "DELETE FROM products WHERE Product_ID = '$id';");
            $stmt->execute ();
        }

        /* This function is a repeat, commented out.
        public function addToCart($userid, $itemid){
            $stmt = $this->DB->prepare("INSERT INTO shopping_cart values(NULL, :userid, :itemid");
                $stmt->bindParam( 'userid', $userid );
                $stmt->bindParam( 'itemid', $itemid );
                $stmt->execute();
        }*/

        public function getShoppingCart($username){
            $stmt = $this->DB->prepare("SELECT * FROM shopping_cart s JOIN products p ON s.Product_ID = p.Product_ID WHERE User_Name = '$username';");
            $stmt->execute();
            return $stmt->fetchAll (PDO::FETCH_ASSOC);
        }

        public function addToShoppingCart($User_Name, $Product_ID){
            $check =  $this->DB->prepare("SELECT * FROM shopping_cart WHERE (User_Name = '$User_Name') AND (Product_ID = $Product_ID);");
            $check->execute ();
            $check = $check->fetchAll (PDO::FETCH_ASSOC);

            if(count($check) == 0){
                $stmt = $this->DB->prepare('INSERT INTO shopping_cart values(NULL, :User_Name, :Product_ID, 1)');
                $stmt->bindParam( 'User_Name', $User_Name );
                $stmt->bindParam( 'Product_ID', $Product_ID );
                $stmt->execute();
            } else {
                $stmt = $this->DB->prepare ("UPDATE shopping_cart SET Product_Count = Product_Count + 1 WHERE (User_Name = :User_Name) AND (Product_ID = :Product_ID)");
                $stmt->bindParam( 'User_Name', $User_Name );
                $stmt->bindParam( 'Product_ID', $Product_ID );
                $stmt->execute ();
            }
        }

        public function removeFromShoppingCart($id){
            $stmt = $this->DB->prepare("DELETE FROM shopping_cart WHERE Cart_ID = $id;");
            $stmt->execute();
        }

        public function addTransactions($cart, $address, $card){
            //print_r($cart);
            foreach($cart as $trans){
                //print_r($trans);
                for($i=0;$i<$trans["Product_Count"];$i++){
                    $p_id = $trans['Product_ID'];
                    $u_name = $trans['User_Name'];

                    $stmt = $this->DB->prepare("INSERT INTO transactions VALUES(NULL,'PURCHASE', '$p_id', '$u_name', :address, :creditcard, now(),'UNPROCESSED');");
                    $stmt->bindParam( 'address',$address);
                    $stmt->bindParam( 'creditcard',$card);
                    $stmt->execute();
                }
            }
        }

        public function getTransactions(){
            $stmt = $this->DB->prepare("SELECT * FROM transactions t JOIN products p ON p.Product_ID = t.Product_ID;");
            $stmt->execute();
            $purchases = $stmt->fetchAll (PDO::FETCH_ASSOC);

            $stmt = $this->DB->prepare("SELECT * FROM transactions WHERE Transaction_Type='DONATION';");
            $stmt->execute();
            $donations = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return array_merge($purchases,$donations);
        }

        public function EmptyShoppingCart($username){
            $stmt = $this->DB->prepare("DELETE FROM shopping_cart WHERE User_Name = '$username';");
            $stmt->bindParam('User_Name', $username);
            $stmt->execute();
        }

        /*This function returns a Boolean indicating whether or not a user's cart is empty.*/
        public function CartIsEmpty($username){
            $check = $this->DB->prepare("SELECT * FROM shopping_cart WHERE User_Name = '$username';");
            $check->bindParam('User_Name', $username);
            $check->execute();
            $check = $check->fetchAll (PDO::FETCH_ASSOC);
            if(count($check) == 0){
                return True;
            } else {
                return False;
            }
        }

        public function findUsernameMatch($name) {
    		# Set up database query
    		$statement = $this->DB->prepare("SELECT User_Name, User_ID FROM users WHERE User_Name = :nomen;");
    		$statement->bindParam('nomen', $name);
    		$statement->execute();
    		$row = $statement->fetch(PDO::FETCH_ASSOC); # row might be empty
    		$row['status'] = 'success'; # this makes sure row stores something
    		return json_encode($row);

	    }

        public function addDonation($amount, $card){
            $stmt = $this->DB->prepare("INSERT INTO transactions VALUES(NULL, 'DONATION', NULL,NULL,NULL,:card,now(),'PROCESSED');");
            $stmt->bindParam("card",$card);
            $stmt->execute();
        }
    }

# Query on the given username (if any).
if (isset($_POST['name'])) {
	# Specify that the output will be JSON.
	header('Content-Type: application/json');
	$base = new DatabaseAdapter();
	echo $base->findUsernameMatch($_POST['name']);
}
else {
	header($_SERVER['SERVER_PROTOCOL'] . ' 400 Invalid Request');
}
    $myDatabaseFunctions = new DatabaseAdapter();
?>
