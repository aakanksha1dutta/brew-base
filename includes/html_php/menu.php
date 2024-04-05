<?php

include_once 'connect_table_worker.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
</html>

<?php
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