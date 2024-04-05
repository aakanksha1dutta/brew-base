<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include_once 'connect_table_worker.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Your order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
</html>

<?php
// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if existing customer
    if (!empty($_POST["existing_custid"])) {
        $customer_id = $_POST["existing_custid"];
    } else {
        // Insert new customer
        $new_cust_id = $_POST["new_custid"];
        $new_cust_fname = $_POST["new_custfname"];
        $new_cust_lname = $_POST["new_custlname"];
        $new_cust_email = $_POST["new_custemail"];
        $new_cust_phone = $_POST["new_custphone"];
        $new_cust_dob = $_POST["new_custdob"];
        $new_cust_street = $_POST["new_custstreet"];
        $new_cust_city = $_POST["new_custcity"];
        $new_cust_state = $_POST["new_custstate"];
        $new_cust_zip = $_POST["new_custzip"];

        // Insert new customer record
        $sql_insert_customer = "INSERT INTO Customer (CustomerID, Customer_FirstName, Customer_LastName, Customer_Email, Customer_Phone, DOB, Customer_Street, Customer_City, Customer_State, Customer_ZIP) VALUES ('$new_cust_id', '$new_cust_fname', '$new_cust_lname', '$new_cust_email', '$new_cust_phone', '$new_cust_dob', '$new_cust_street','$new_cust_city', '$new_cust_state', '$new_cust_zip')";
        $result = mysqli_query($conn, $sql_insert_customer);
        if ($result == false) {
            echo "Error: " . $sql_insert_customer . "<br>" . mysqli_connect_error();
            mysqli_close($conn);
            exit;
        }
        $customer_id = $new_cust_id;
    }

    // Get the last TransactionID to determine the next auto-increment value
    $sql_get_last_transaction_id = "SELECT MAX(TransactionID) AS LastTransactionID FROM Order_Item";
    $result = mysqli_query($conn, $sql_get_last_transaction_id);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $transaction_id = intval($row["LastTransactionID"]) + 1;
    } else {
        $transaction_id = 1;
    }
    // Get current timestamp
    $timestamp = date("Y-m-d H:i:s");

    // Get worker SSN (Assuming the logged-in worker's SSN is stored in $_SESSION["worker_ssn"])

    // Calculate Total amount and Sub_Total
    $total_amount = 0;

    // Insert order(s) into Orders table
    $menu_items = array(
        "Iced Caramel Macchiato" => "macchiato",
        "Double Hot Chocolate" => "hotchoco",
        "Hot Jasmine Tea" => "jasminetea",
        "Iced Lavender Latte" => "latte",
        "Iced Americano" => "americano",
        "Baby Corn Crisps" => "babycorn",
        "Caesar Salad" => "caesar",
        "Lox Bagel" => "lox",
        "BBQ Tofu" => "tofu",
        "Miso Ramen" => "miso",
        "Crispy Rice Rolls" => "crispyrice",
        "Aglio e Olio Pasta" => "algio",
        "Carrot Cake" => "carrot",
        "Black Forest Cake" => "blackfor",
        "Glazed Doughnut" => "glazed",
        "Mint Choco Ice Cream" => "mintchoco"
    );

    // Insert transaction record
    $sql_insert_transaction = "INSERT INTO TRANSACTION (TransactionID, Timestamp, CustomerID) VALUES ('$transaction_id', '$timestamp', '$customer_id')";
    $result = mysqli_query($conn, $sql_insert_transaction);
    if ($result == false) {
        echo "Error: " . $sql_insert_transaction . "<br>" . mysqli_connect_errno() ;
        mysqli_close($conn);
        exit;
    }

    foreach ($menu_items as $item_name => $input_name) {
        $quantity = intval($_POST[$input_name]);
        if ($quantity > 0) {
            // Get ItemID and Price for the item
            $sql_get_menu_item_info = "SELECT ItemID, Price FROM MENU WHERE ItemName = '$item_name'";
            $result = mysqli_query($conn, $sql_get_menu_item_info);
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $menu_item_id = $row["ItemID"];
                $price = $row["Price"];

                // Calculate Sub_Total for the order item
                $order_item_sub_total = $quantity * $price;

                // Insert order item record
                $sql_insert_order_item = "INSERT INTO Order_Item (TransactionID, ItemID, Quantity, Subtotal) VALUES ('$transaction_id', '$menu_item_id', '$quantity', '$order_item_sub_total')";
                $result = mysqli_query($conn, $sql_insert_order_item);
                if ($result==false) {
                    echo "Error: " . $sql_insert_order_item . "<br>" . mysqli_connect_error();
                    mysqli_close($conn);
                    exit;
                }
            }
        }
    }



echo "Order placed successfully!";
    $query = "SELECT o.itemID, m.itemName, m.price, o.quantity, o.subtotal from order_item o join menu m on o.itemid=m.itemid where o.transactionID ='$transaction_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0){
    $query = array();
    while($query[] = mysqli_fetch_assoc($result));
    array_pop($query);

    // Output a dynamic table of the results with column headings.
    echo "<h2> Your orders: </h2>";
    echo '<table border="1">';
    echo '<tr>';
    foreach($query[0] as $key => $value) {
        echo '<td>';
        echo $key;
        echo '</td>';
    }
    echo '</tr>';
    foreach($query as $row) {
        echo '<tr>';
        foreach($row as $column) {
            echo '<td>';
            echo $column;
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

    $query= mysqli_query($conn, "SELECT SUM(SUBTOTAL) AS SUM FROM ORDER_ITEM where transactionID ='$transaction_id'");
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $total = $row['SUM'];
        echo "<br><br>";
        echo "<h3> Your total: $total </h3>";
    }
    
}else{
    echo "Something went wrong....";
}

}

// Close connection
mysqli_close($conn);
?>