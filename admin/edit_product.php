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

$id = $_GET['id'];

if (isset($_POST['update_product'])) {

    $album_name = $_POST['album_name'];
    $version = $_POST['version'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];

    $sql = "UPDATE products SET
            album_name = '$album_name',
            version = '$version',
            description = '$description',
            price = '$price',
            stock_quantity = '$stock_quantity'
            WHERE id = $id";

    mysqli_query($conn, $sql);

    header("Location: products.php");
    exit();
}

$sql = "SELECT * FROM products WHERE id = $id";

$result = mysqli_query($conn, $sql);

$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Product not found.");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Edit Product</title>

</head>

<body>

    <h1>Edit Product</h1>

    <p>
        <a href="products.php">Back to Products</a>
    </p>

    <form method="POST">

        <label>Album Name</label>
        <input
            type="text"
            name="album_name"
            value="<?php echo $product['album_name']; ?>"
            required
        >

        <br><br>

        <label>Version</label>
        <input
            type="text"
            name="version"
            value="<?php echo $product['version']; ?>"
        >

        <br><br>

        <label>Description</label>
        <textarea name="description"><?php echo $product['description']; ?></textarea>

        <br><br>

        <label>Price</label>
        <input
            type="number"
            name="price"
            step="0.01"
            value="<?php echo $product['price']; ?>"
            required
        >

        <br><br>

        <label>Stock Quantity</label>
        <input
            type="number"
            name="stock_quantity"
            value="<?php echo $product['stock_quantity']; ?>"
            required
        >

        <br><br>

        <button type="submit" name="update_product">
            Update Product
        </button>

    </form>

</body>

</html>