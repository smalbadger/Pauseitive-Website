<?php
//This file displays a table of transactions for the administrator's eyes openssl_csr_get_public_key
    print("<h1>Administrator Report</h1>");
    require_once('./database.php');

    //get all of the transactions joined with the users.
    $transactions = $myDatabaseFunctions->getTransactions();
    $total = 0.00;
    print("<table>");
    print("
    <tr>
        <th>Status</th>
        <th>Transaction ID</th>
        <th>Type</th>
        <th>Product ID</th>
        <th>User Name</th>
        <th>Address</th>
        <th>Credit Card</th>
        <th>Date</th>
        <th>Price</th>
    </tr>
    ");

    //print all of the transactions in table form
    foreach($transactions as $t){
        if(isset($t['Product_Price'])){
            $price = $t["Product_Price"];
            $total += $price;
        }
        else{
            $price = 'UNKNOWN';
        }

?>
        <tr>
            <td><?=$t["Status"]?></td>
            <td><?=$t["Transaction_ID"]?></td>
            <td><?=$t["Transaction_Type"]?></td>
            <td><?=$t["Product_ID"]?></td>
            <td><?=$t["User_Name"]?></td>
            <td><?=$t["Address"]?></td>
            <td><?=$t["Credit_Card"]?></td>
            <td><?=$t["Transaction_Date"]?></td>
            <td>$<?=$price?></td>
        </tr>
<?php
    }
    print("</table>");
    print('<p id="total"><strong>Total: $'. $total .'</strong></p>');

?>
