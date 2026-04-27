<?php

include "Db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['ItemName'];
    $desc = $_POST['Description'];
    $price = $_POST['Price'];
    $cat = $_POST['Category'];

    $sql = $conn->prepare("Delete from Menu where id =?");
    $sql->bind_param('s', $id);
    if ($sql->execute()) {
        header ("Location: Home.php");
    }
};

?>