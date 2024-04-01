<?php
// Database connection parameters
$servername = "localhost"; // MySQL server hostname
$username = "root"; //  MySQL username
$password = ""; //  MySQL password
$dbname = "brewbase"; // MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input
function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if existing customer
    if (!empty($_POST["existing_custid"])) {
        $customer_id = sanitize_input($_POST["existing_custid"]);
    } else {
        // Insert new customer
        $new_cust_id = sanitize_input($_POST["new_custid"]);
        $new_cust_fname = sanitize_input($_POST["new_custfname"]);
        $new_cust_lname = sanitize_input($_POST["new_custlname"]);
        $new_cust_email = sanitize_input($_POST["new_custemail"]);
        $new_cust_phone = sanitize_input($_POST["new_custphone"]);
        $new_cust_dob = sanitize_input($_POST["new_custdob"]);
        $new_cust_street = sanitize_input($_POST["new_custstreet"]);
        $new_cust_city = sanitize_input($_POST["new_custcity"]);
        $new_cust_state = sanitize_input($_POST["new_custstate"]);
        $new_cust_zip = sanitize_input($_POST["new_custzip"]);

        // Insert new customer record
        $sql_insert_customer = "INSERT INTO Customer (CustomerID, Customer_FirstName, Customer_LastName, Customer_Email, Customer_Phone, DOB, Customer_Street, Customer_City, Customer_State, Customer_ZIP) VALUES ('$new_cust_id', '$new_cust_fname', '$new_cust_lname', '$new_cust_email', '$new_cust_phone', '$new_cust_dob', '$new_cust_street','$new_cust_city', '$new_cust_state', '$new_cust_zip')";
        if ($conn->query($sql_insert_customer) !== TRUE) {
            echo "Error: " . $sql_insert_customer . "<br>" . $conn->error;
            $conn->close();
            exit;
        }
        $customer_id = $new_cust_id;
    }

    // Get the last TransactionID to determine the next auto-increment value
    $sql_get_last_transaction_id = "SELECT MAX(TransactionID) AS LastTransactionID FROM Order_Item";
    $result = $conn->query($sql_get_last_transaction_id);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $transaction_id = intval($row["LastTransactionID"]) + 1;
    } else {
        $transaction_id = 1;
    }
    // Get current timestamp
    $timestamp = date("Y-m-d H:i:s");

    // Get worker SSN (Assuming the logged-in worker's SSN is stored in $_SESSION["worker_ssn"])
    $worker_ssn = $_SESSION["worker_ssn"]; // TODO: Make sure to set this value properly

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

    foreach ($menu_items as $item_name => $input_name) {
        $quantity = intval($_POST[$input_name]);
        if ($quantity > 0) {
            // Get ItemID and Price for the item
            $sql_get_menu_item_info = "SELECT ItemID, Price FROM Menu WHERE ItemName = '$item_name'";
            $result = $conn->query($sql_get_menu_item_info);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $menu_item_id = $row["ItemID"];
                $price = $row["Price"];

                // Calculate Sub_Total for the order item
                $order_item_sub_total = $quantity * $price;

                // Insert order item record
                $sql_insert_order_item = "INSERT INTO Order_Item (TransactionID, ItemID, Quantity, Subtotal) VALUES ('$transaction_id', '$menu_item_id', '$quantity', '$order_item_sub_total')";
                if ($conn->query($sql_insert_order_item) !== TRUE) {
                    echo "Error: " . $sql_insert_order_item . "<br>" . $conn->error;
                    $conn->close();
                    exit;
                }

                // Calculate total subtotal for all order items
                $total_amount += $order_item_sub_total;
            }
        }
    }

// Insert transaction record
$sql_insert_transaction = "INSERT INTO Transaction (TransactionID, Timestamp, TotalAmt, CustomerID, WorkerSSN) VALUES ('$transaction_id', '$timestamp', '$total_amount', '$customer_id', '$worker_ssn')";
if ($conn->query($sql_insert_transaction) !== TRUE) {
    echo "Error: " . $sql_insert_transaction . "<br>" . $conn->error;
    $conn->close();
    exit;
}

echo "Order placed successfully!";
}

// Close connection
$conn->close();
?>