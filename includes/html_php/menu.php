<?php

include_once 'connect_table_worker.php';

$query= "SELECT * FROM MENU";
$result = mysqli_query($conn, $query);
$query = array();
while($query[] = mysqli_fetch_assoc($result));
array_pop($query);

// Output a dynamic table of the results with column headings.
echo "<h1> Menu Table </h1>";
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
?>