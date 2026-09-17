<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include "../includes/db.php";

$sql = "SELECT * FROM contact_messages
        ORDER BY sent_at DESC";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Customer Messages</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <h1>Customer Messages</h1>

    <p>
        <a href="dashboard.php">Dashboard</a>
    </p>

    <table class="admin-table">

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Date</th>
        </tr>

        <?php while ($message = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $message['id']; ?></td>

            <td><?php echo $message['name']; ?></td>

            <td><?php echo $message['email']; ?></td>

            <td><?php echo $message['subject']; ?></td>

            <td><?php echo $message['message']; ?></td>

            <td><?php echo $message['sent_at']; ?></td>

        </tr>

        <?php } ?>

    </table>

</body>

</html>