<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>SEOULMATE Admin Dashboard</title>

</head>

<body>

    <h1>SEOULMATE Admin Dashboard</h1>

    <p>Welcome, <?php echo $_SESSION['admin_name']; ?>!</p>

    <h2>Admin Menu</h2>

    <p><a href="products.php">Manage Products</a></p>

    <p><a href="orders.php">View Orders</a></p>

    <p><a href="messages.php">View Messages</a></p>

    <p><a href="logout.php">Logout</a></p>

</body>

</html>
