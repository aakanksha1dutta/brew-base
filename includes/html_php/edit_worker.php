<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    include_once 'connect_table_worker.php';

// Check if SSN is provided in the URL
if(isset($_GET['ssn']) && !empty($_GET['ssn'])) {
    $ssn = $_GET['ssn'];

    // Fetch worker details from the database
    $sql = "SELECT * FROM WORKER WHERE WorkerSSN = '$ssn'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        // Worker found, retrieve details
        $row = mysqli_fetch_assoc($result);
        $workerSSN = $row['WorkerSSN'];
        $firstName = $row['Worker_FirstName'];
        $lastName = $row['Worker_LastName'];
        $email = $row['Worker_Email'];
        $phone = $row['Worker_Phone'];
        $supervisorSSN = $row['SupervisorSSN'];
        $wage = $row['Wage'];
        $hireDate = $row['Hire_date'];
        $street = $row['Worker_Street'];
        $city = $row['Worker_City'];
        $state = $row['Worker_State'];
        $zip = $row['Worker_Zip'];

        // Now you can display a form to edit the worker's information
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Worker</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
        </head>
        <body>
        <div class="container">
            <h2>Edit Worker Information</h2>
            <form method="post" action="update_worker.php">
                <input type="hidden" name="ssn" value="<?php echo $workerSSN; ?>">
                First Name: <input type="text" name="firstName" value="<?php echo $firstName; ?>"><br>
                Last Name: <input type="text" name="lastName" value="<?php echo $lastName; ?>"><br>
                Email: <input type="text" name="email" value="<?php echo $email; ?>"><br>
                Phone: <input type="text" name="phone" value="<?php echo $phone; ?>"><br>
                Supervisor SSN: <input type="text" name="supervisorSSN" value="<?php echo $supervisorSSN; ?>"><br>
                Wage: <input type="text" name="wage" value="<?php echo $wage; ?>"><br>
                Hire Date: <input type="text" name="hireDate" value="<?php echo $hireDate; ?>"><br>
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
        echo "Worker not found.";
    }
} else {
    echo "Invalid request.";
}
?>

