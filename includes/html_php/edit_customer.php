<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    include_once 'connect_table_worker.php';

if(isset($_GET['CustomerID']) && !empty($_GET['CustomerID'])) {
    $CustomerID = $_GET['CustomerID'];

    // Fetch worker details from the database
    $sql = "SELECT * FROM CUSTOMER WHERE CustomerID = '$CustomerID'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        // Worker found, retrieve details
        $row = mysqli_fetch_assoc($result);
        $CustomerID = $row['CustomerID'];
        $firstName = $row['Customer_FirstName'];
        $lastName = $row['Customer_LastName'];
        $phone = $row['Customer_Phone'];
        $email = $row['Customer_Email'];
        $DOB = $row['DOB'];
        $street = $row['Customer_Street'];
        $city = $row['Customer_City'];
        $state = $row['Customer_State'];
        $zip = $row['Customer_Zip'];

        // Now you can display a form to edit the worker's information
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Customer</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
        <div class="container">
            <h2>Edit Customer Information</h2>
            <form method="post" action="update_customer.php">
                <input type="hidden" name="CustomerID" value="<?php echo $CustomerID; ?>">
                First Name: <input type="text" name="firstName" value="<?php echo $firstName; ?>"><br>
                Last Name: <input type="text" name="lastName" value="<?php echo $lastName; ?>"><br>
                Email: <input type="text" name="email" value="<?php echo $email; ?>"><br>
                DOB: = <input type="text" name="DOB" value="<?php echo $DOB; ?>"><br>
                Phone: <input type="text" name="phone" value="<?php echo $phone; ?>"><br>
                Street: <input type="text" name="street" value="<?php echo $street; ?>"><br>
                City: <input type="text" name="city" value="<?php echo $city; ?>"><br>
                State: <input type="text" name="state" value="<?php echo $state; ?>"><br>
                Zip: <input type="text" name="zip" value="<?php echo $zip; ?>"><br>
                <input type="submit" name="submit" value="Update">
            </form>
        </div>
        </body>
        </html>
        <?php
    } else {
        echo "customer not found.";
    }
} else {
    echo "Invalid request.";
}
?>

