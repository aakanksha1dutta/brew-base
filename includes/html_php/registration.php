<?php
    #session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    #include_once 'connect_table_worker.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        ?>
        <form action="insert_into_worker.php" method="post">
        <div class="form-group">
                <input type="text" class="form-control" name="WorkerSSN" placeholder="WorkerSSN:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="FirstName" placeholder="First Name:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="LastName" placeholder="Last Name:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="phone" placeholder="phone:">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="SupervisorSSN" placeholder="SupervisorSSN:">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="Wage" placeholder="Wage:">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" name="Hire_Date" placeholder="Hire_Date:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="Worker_Street" placeholder="Worker_Street:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="Worker_City" placeholder="Worker_City:">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="Worker_State" placeholder="Worker_State:">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="Worker_Zip" placeholder="Worker_Zip:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="worker_login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>