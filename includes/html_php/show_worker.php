
<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    include_once 'includes/connect_table_worker.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title></title>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Search for workers:<br>
    Search by SSN: <input type="text" name="ssn"><br>
    Search by Email: <input type="text" name="email"><br>
    <input type="submit" name="submit" value="Search">
</form>

<?php 

echo "Matching workers, shown below: "."</br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if SSN or Email is provided
    if (!empty($_POST['ssn']) || !empty($_POST['email'])) {
        $ssn = !empty($_POST['ssn']) ? $_POST['ssn'] : '';
        $email = !empty($_POST['email']) ? $_POST['email'] : '';

        $sql = "SELECT * FROM WORKER WHERE WorkerSSN = '$ssn' OR Worker_Email = '$email';";
    } else {
        // If no SSN or Email is specified, show all workers
        $sql = "SELECT * FROM WORKER;";
    }
    //$sql = "SELECT * FROM WORKER;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['Worker_FirstName']." ". $row['Worker_LastName']." ".$row['Worker_Email']."</br>";
            echo $row['WorkerSSN']."</br>";
        }
    }
}
    
?>

</body>
</html>
