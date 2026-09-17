<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include "../includes/db.php";

$sql = "SELECT orders.*, users.name AS user_name
        FROM orders
        JOIN users ON orders.user_id = users.id
        ORDER BY orders.order_date DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Manage Orders</title>

</head>

<body>

    <h1>Customer Orders</h1>

    <p>
        <a href="dashboard.php">Dashboard</a>
    </p>

    <table border="1" cellpadding="10">

        <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Status</th>
            <th>Order Date</th>
        </tr>

        <?php while ($order = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $order['id']; ?></td>

            <td><?php echo $order['user_name']; ?></td>

            <td>
                LKR <?php echo number_format($order['total_amount'], 2); ?>
            </td>

            <td><?php echo $order['order_status']; ?></td>

            <td><?php echo $order['order_date']; ?></td>

        </tr>

        <?php } ?>

    </table>

</body>

</html>