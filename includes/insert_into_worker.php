<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
    include_once 'connect_table_worker.php';

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
            VALUES ('$WorkerSSN', '$Worker_FirstName', '$Worker_LastName', '$Worker_Email', '$Worker_Phone', '$SupervisorSSN', '$Hire_date', '$Worker_Street', '$Worker_City', '$Worker_State', '$Worker_Zip');";

    mysqli_query($conn, $sql);

    /* SOMETHING IS WRONG WITH THIS PREPARED STATEMENT
    $stmt = mysqli_stmt_init($conn);
    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
    if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt,"sssssssssss", $WorkerSSN, $FirstName, $LastName, $Worker_Email, $Worker_Phone, $SupervisorSSN, $Hire_date, $Worker_Street, $Worker_City, $Worker_State, $Worker_Zip);
        mysqli_stmt_execute($stmt);
        echo "<div class='alert alert-success'>You are registered successfully.</div>";
    }else{
        die("Something went wrong");
    }*/
    }

    header("Location: ../includes/regis_success.php?signup=success");