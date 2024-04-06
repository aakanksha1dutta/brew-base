<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include_once 'connect_table_worker.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (!empty($_POST['CustomerID']) && !empty($_POST['firstName']) && !empty($_POST['lastName']) 
    && !empty($_POST['email']) && !empty($_POST['DOB']) && !empty($_POST['phone']) 
    && !empty($_POST['street']) && !empty($_POST['city']) && !empty($_POST['state']) 
    && !empty($_POST['zip'])) {

        // Sanitize input data to prevent SQL injection
        $CustomerID = mysqli_real_escape_string($conn, $_POST['CustomerID']);
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
        $street = mysqli_real_escape_string($conn, $_POST['street']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $zip = mysqli_real_escape_string($conn, $_POST['zip']);

        // Update Customer information in the database
        $sql = "UPDATE CUSTOMER SET 
                Customer_FirstName = '$firstName', 
                Customer_LastName = '$lastName', 
                Customer_Email = '$email', 
                Customer_Phone = '$phone', 
                DOB = '$DOB',
                Customer_Street = '$street', 
                Customer_City = '$city', 
                Customer_State = '$state', 
                Customer_Zip = '$zip' 
                WHERE CustomerID = '$CustomerID';";

        if (mysqli_query($conn, $sql)) {
            echo "Customer information updated successfully.";
        } else {
            echo "Error updating Customer information: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div><p>Order?<a href="make_order.html">Order here</a></p></div>

</body>
</html>

