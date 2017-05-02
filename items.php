
<?php
	
	print("<h1>The Pauseitive Collection</h1>");
	require_once './database.php';
	$ItemsArray = $myDatabaseFunctions->getItemsArray();
	foreach($ItemsArray as $item){
?>

<div class = "items">
	<div class = "item">
	<img src= <?= $item['Product_Image_Path']?> alt="clothing item" class = "pic">
	<br>
		<div class = "itemtext">
			<div class = "itemprice">
			<?= $item['Product_Name'] ?>
			<br>
			<?= $item['Product_Price'] ?>
			<br>
			</div>
			<form action = "shopping_cart.php" method = "post">
				<input type = "hidden" name = 'id' value = <?= $item['Product_ID'] ?>>
				<input type="submit" name="Buy" value="Add To Shopping Cart"/>
			</form>
		</div>
	</div>
	<br>
</div>


<?php
	}
?>
