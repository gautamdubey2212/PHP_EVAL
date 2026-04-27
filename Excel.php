<?php
include "Db.php";


header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=menu_data.csv");


$output = fopen("php://output", "w");


fputcsv($output, ["ID", "Name", "Description", "Price", "Category"]);


$result = $conn->query("SELECT * FROM Menu");

while($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['id'],
        $row['ItemName'],
        $row['Description'],
        $row['Price'],
        $row['Category']
    ]);
}


fclose($output);

?>