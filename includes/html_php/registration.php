<?php
    #session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    #include_once 'includes/connect_table_worker.php';

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
        /*
        if (isset($_POST["submit"])) {
           $WorkerSSN = $_POST["WorkerSSN"];
           $Worker_FirstName = $_POST["FirstName"];
           $Worker_LastName = $_POST["LastName"];
           $Worker_Email = $_POST["email"];
           $Worker_Phone = $_POST["phone"];
           $SupervisorSSN = $_POST["SupervisorSSN"];
           $Wage = $_POST["Wage"];
           $Hire_date = $_POST["Hire_Date"];
           $Worker_Street = $_POST["Worker_Street"];
           $Worker_City = $_POST["Worker_City"];
           $Worker_State = $_POST["Worker_State"];
           $Worker_Zip = $_POST["Worker_Zip"];

           $errors = array();
           
           if (empty($WorkerSSN) 
           #OR empty($FirstName) OR empty($LastName) OR empty($Worker_Email) OR empty($Worker_Phone)
           ) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($Worker_Email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           $sql = "SELECT * FROM WORKER WHERE Worker_Email = '$Worker_Email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           $sql = "SELECT * FROM WORKER WHERE WorkerSSN = '$WorkerSSN'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"SSN already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO WORKER (WorkerSSN, Worker_FirstName, Worker_LastName, Worker_Email, Worker_Phone, SupervisorSSN, Hire_date, Worker_Street, Worker_City, Worker_State, Worker_Zip)
            VALUES ($WorkerSSN, $Worker_FirstName, $Worker_LastName, $Worker_Email, $Worker_Phone, $SupervisorSSN, $Hire_date, $Worker_Street, $Worker_City, $Worker_State, $Worker_Zip);";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sssssssssss", $WorkerSSN, 
                $FirstName, $LastName, $Worker_Email, $Worker_Phone, 
                $SupervisorSSN, $Hire_date, $Worker_Street, 
                $Worker_City, $Worker_State, $Worker_Zip);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          
        
        }
        */
        ?>
        <form action="includes/insert_into_worker.php" method="post">
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