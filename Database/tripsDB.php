<?php

$conn = new PDO(
    "mysql:host=127.0.0.1;port=3306;dbname=projekti;charset=utf8",
    "root",
    "1234"
);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>