<?php
    require_once('./database.php');

    //gets all of the products from the products database.
    $products = $myDatabaseFunctions->getItemsArray();
    $i = 1;

    //gives option to add a product
    print('
    <fieldset>
        <form action="home.php" method="post">
            <label>Image File: <input type="file" name="image_path" required="required"/></label>
            <label>Name: <input type="text" name="product_name" required="required"/></label>
            <label>Price: <input type="text" name="price" required="required"/></label>
            <input type="submit" name="add" value="add product"/>
        </form>
    </fieldset>
    ');
    print('<br />');

    //print all of the products in the products table and give option to delete each one.
    print("<table id='manage-products'>");
    print("
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Rating</th>
        <th>Option</th>
    </tr>
    ");
    foreach($products as $p){
        $j = 'row'.strval($i);
?>
        <tr>
            <td><img class="table-image" src="<?=$p['Product_Image_Path']?>" alt="<?=$p['Product_Name']?>"/></td>
            <td><?=$p["Product_Name"]?></td>
            <td><?=$p["Product_Price"]?></td>
            <td><?=$p["Product_Rating"]?></td>
            <td id="<?=$j?>">
                <form action="home.php" method="post">
                    <input type="hidden" name="id" value="<?=$p["Product_ID"]?>"/>
                    <input type="submit" name="remove" value="remove"/>
                </form>
            </td>
        </tr>
<?php
        $i++;
    }
    print("</table>");
?>
