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

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
<div class="admin-container">

    <h1>SEOULMATE Admin Dashboard</h1>

    <p>Welcome, <?php echo $_SESSION['admin_name']; ?>!</p>

    <h2>Dashboard Overview</h2>

    <div class="dashboard-cards">

    <div class="dashboard-card">
        <h3>Total Products</h3>
        <p><?php echo $product_count['total']; ?></p>
    </div>

    <div class="dashboard-card">
        <h3>Total Users</h3>
        <p><?php echo $user_count['total']; ?></p>
    </div>

    <div class="dashboard-card">
        <h3>Total Orders</h3>
        <p><?php echo $order_count['total']; ?></p>
    </div>

    <div class="dashboard-card">
        <h3>Total Messages</h3>
        <p><?php echo $message_count['total']; ?></p>
    </div>

</div>

    <h2>Admin Menu</h2>

<div class="admin-menu">

    <a href="products.php">Manage Products</a>

    <a href="orders.php">View Orders</a>

    <a href="messages.php">View Messages</a>

    <a href="logout.php">Logout</a>

</div>

</div>

</body>

</html>