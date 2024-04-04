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
        
        <div><p>New Worker Registration is successful!</p></div>
        <div><p>Make new registration? <a href="registration.php">Login Here</a></p></div>
        <div><p>Want to log in ? <a href="worker_login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>