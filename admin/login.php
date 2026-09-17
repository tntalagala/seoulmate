<?php

session_start();

include "../includes/db.php";

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users
            WHERE email = '$email'
            AND password = '$password'
            AND role = 'admin'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $admin = mysqli_fetch_assoc($result);

        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['name'];

        header("Location: dashboard.php");
        exit();

    } else {

        $error = "Invalid email or password.";

    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>SEOULMATE Admin Login</title>

</head>

<body>

    <h1>SEOULMATE Admin Login</h1>

    <?php if (isset($error)) { ?>

        <p><?php echo $error; ?></p>

    <?php } ?>

    <form method="POST">

        <label>Email</label>
        <input type="email" name="email" required>

        <br><br>

        <label>Password</label>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit" name="login">Login</button>

    </form>

</body>

</html>