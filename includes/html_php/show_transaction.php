
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
    <title>Transaction Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Search for transaction:<br>
    Search by customer ID: <input type="text" name="customer_id"><br>
    <input type="submit" name="submit" value="Search">
</form>

<?php 

echo "Matching transactions, shown below: "."</br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if SSN or Email is provided
    if (!empty($_POST['customer_id']) ) {
        $customerId = !empty($_POST['customer_id']) ? $_POST['customer_id'] : '';

        $sql = "SELECT * FROM TRANSACTION WHERE CustomerID = '$customerId';";
    } else {
        // If no SSN or Email is specified, show all workers
        $sql = "SELECT * FROM TRANSACTION;";
    }
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "TransactionID | Timestamp | CustomerID | "."</br>";
            echo $row['TransactionID']." | ". $row['Timestamp']." | ".$row['CustomerID']." | ";
            // Add an "edit" button for each worker
            echo "<a href='delete_transaction.php?ssn=" . $row['TransactionID'] . "' class='btn btn-primary'>Delete Transaction</a>";
            echo "<br><br>";
        }
    }
}
    
?>

</body>
</html>
