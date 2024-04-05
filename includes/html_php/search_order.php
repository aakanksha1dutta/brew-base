<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');
include_once 'connect_table_worker.php';

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if existing customer
    $transid = $_POST['transid'] ?? null;
    $query = "SELECT o.itemID, m.itemName, m.price, o.quantity, o.subtotal from order_item o join menu m on o.itemid=m.itemid where o.transactionID ='$transid'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0){
    $query = array();
    while($query[] = mysqli_fetch_assoc($result));
    array_pop($query);

    // Output a dynamic table of the results with column headings.
    echo "<h2> Your orders: </h2>";
    echo '<table border="1">';
    echo '<tr>';
    foreach($query[0] as $key => $value) {
        echo '<td>';
        echo $key;
        echo '</td>';
    }
    echo '</tr>';
    foreach($query as $row) {
        echo '<tr>';
        foreach($row as $column) {
            echo '<td>';
            echo $column;
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';

    $query= mysqli_query($conn, "SELECT SUM(SUBTOTAL) AS SUM FROM ORDER_ITEM where transactionID ='$transid'");
    if (mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $total = $row['SUM'];
        echo "<br><br>";
        echo "<h3> Your total: $total </h3>";
    }
    
}else{
    echo "No such TransactionID";
}
}

mysqli_close($conn);
?>