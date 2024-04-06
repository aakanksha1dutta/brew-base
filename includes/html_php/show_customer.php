
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    include_once 'connect_table_worker.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Search for customer:<br>
    Search by Email: <input type="text" name="email"><br>
    <input type="submit" name="submit" value="Search">
</form>

<?php 

echo "Matching workers, shown below: "."</br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if SSN or Email is provided
    if (!empty($_POST['email'])) {
        $email = !empty($_POST['email']) ? $_POST['email'] : '';

        $sql = "SELECT * FROM CUSTOMER WHERE Customer_Email = '$email';";
    } else {
        // If no SSN or Email is specified, show all workers
        $sql = "SELECT * FROM CUSTOMER;";
    }
    //$sql = "SELECT * FROM WORKER;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['CustomerID']." ". $row['Customer_FirstName']." ".$row['Customer_LastName']."</br>"
            .$row['Customer_Email']." ". $row['Customer_Phone']." ".$row['DOB']."</br>"
            .$row['Customer_Street']." ". $row['Customer_City']." ".$row['Customer_State']." ".$row['Customer_Zip']."</br>"
            ;
            // Add an "edit" button for each worker
            echo "<a href='edit_customer.php?CustomerID=" . $row['CustomerID'] . "' class='btn btn-primary'>Edit customer</a>";
            echo "<br><br>";
        }
    }
}
    
?>

</body>
</html>
