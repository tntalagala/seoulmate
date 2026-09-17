<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include "../includes/db.php";

$sql = "SELECT products.*, artists.name AS artist_name
        FROM products
        JOIN artists ON products.artist_id = artists.id";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Manage Products</title>

</head>

<body>

    <h1>Manage Products</h1>

    <p>
        <a href="dashboard.php">Dashboard</a>
    </p>

    <p>
        <a href="add_product.php">Add New Product</a>
    </p>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Album</th>
            <th>Artist</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>

        <?php while ($product = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $product['id']; ?></td>

            <td><?php echo $product['album_name']; ?></td>

            <td><?php echo $product['artist_name']; ?></td>

            <td>LKR <?php echo number_format($product['price'], 2); ?></td>

            <td><?php echo $product['stock_quantity']; ?></td>

            <td>
                <a href="edit_product.php?id=<?php echo $product['id']; ?>">
                    Edit
                </a>

                |

                <a href="delete_product.php?id=<?php echo $product['id']; ?>">
                    Delete
                </a>
            </td>

        </tr>

        <?php } ?>

    </table>

</body>

</html>
