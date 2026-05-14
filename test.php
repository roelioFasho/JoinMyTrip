<?php

try {

    $conn = new PDO(
        "mysql:host=localhost;dbname=joinmytrip",
        "root",
        "root"
    );

    echo "Connected successfully";

} catch (PDOException $e) {

    echo $e->getMessage();
}
?>