<?php

$conn = new PDO(
    "mysql:host=127.0.0.1;port=3306;dbname=joinmytrip;charset=utf8",
    "root",
    "root"
);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>