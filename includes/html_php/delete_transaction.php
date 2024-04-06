<?php
// Include the database connection file
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include_once 'connect_table_worker.php';

// Check if TransactionID is provided
if(isset($_GET['ssn']) && !empty($_GET['ssn'])) {
    // Sanitize input to prevent SQL injection
    $transactionID = $_GET['ssn'];

    // Prepare SQL statement
    $sql = "DELETE FROM TRANSACTION WHERE TransactionID = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $transactionID);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect back to the previous page after deleting the transaction
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // If TransactionID is not provided or empty
    echo "TransactionID is missing or empty.";
}

// Close the database connection
$conn->close();
?>
