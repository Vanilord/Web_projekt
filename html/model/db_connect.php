<?php
$servername = "localhost";
    $username = "admin";
    $password = "513701";
    $dbname = "knihy";


try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die($e->getMessage());
}
?>