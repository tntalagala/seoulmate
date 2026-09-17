<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include "../includes/db.php";

$product_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM products");
$product_count = mysqli_fetch_assoc($product_result);

$user_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users");
$user_count = mysqli_fetch_assoc($user_result);

$order_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM orders");
$order_count = mysqli_fetch_assoc($order_result);

$message_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM contact_messages");
$message_count = mysqli_fetch_assoc($message_result);

?>

<!DOCTYPE html>
<html>

<head>

    <title>SEOULMATE Admin Dashboard</title>

</head>

<body>

    <h1>SEOULMATE Admin Dashboard</h1>

    <p>Welcome, <?php echo $_SESSION['admin_name']; ?>!</p>

    <h2>Dashboard Overview</h2>

    <p>Total Products: <?php echo $product_count['total']; ?></p>

    <p>Total Users: <?php echo $user_count['total']; ?></p>

    <p>Total Orders: <?php echo $order_count['total']; ?></p>

    <p>Total Messages: <?php echo $message_count['total']; ?></p>

    <h2>Admin Menu</h2>

    <p><a href="products.php">Manage Products</a></p>

    <p><a href="orders.php">View Orders</a></p>

    <p><a href="messages.php">View Messages</a></p>

    <p><a href="logout.php">Logout</a></p>

</body>

</html>