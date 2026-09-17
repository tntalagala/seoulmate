<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include "../includes/db.php";

if (!isset($_GET['id'])) {
    die("Product not found.");
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM products WHERE id = $id";

mysqli_query($conn, $sql);

header("Location: products.php");
exit();

?>