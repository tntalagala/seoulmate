<?php

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

include "../includes/db.php";

if (isset($_POST['add_product'])) {

    $artist_id = $_POST['artist_id'];
    $category_id = $_POST['category_id'];
    $album_name = $_POST['album_name'];
    $version = $_POST['version'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stock_quantity = $_POST['stock_quantity'];
    $image = $_POST['image'];
    $release_date = $_POST['release_date'];

    $sql = "INSERT INTO products
            (artist_id, category_id, album_name, version, description,
            price, stock_quantity, image, release_date)
            VALUES
            ('$artist_id', '$category_id', '$album_name', '$version',
            '$description', '$price', '$stock_quantity', '$image',
            '$release_date')";

    mysqli_query($conn, $sql);

    header("Location: products.php");
    exit();
}

$artists = mysqli_query($conn, "SELECT * FROM artists");
$categories = mysqli_query($conn, "SELECT * FROM categories");

?>

<!DOCTYPE html>
<html>

<head>

    <title>Add Product</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <h1>Add New Product</h1>

    <p>
        <a href="products.php">Back to Products</a>
    </p>

   <form method="POST" class="admin-form">

        <label>Artist</label>
        <select name="artist_id" required>

            <?php while ($artist = mysqli_fetch_assoc($artists)) { ?>

                <option value="<?php echo $artist['id']; ?>">
                    <?php echo $artist['name']; ?>
                </option>

            <?php } ?>

        </select>

        <br><br>

        <label>Category</label>
        <select name="category_id" required>

            <?php while ($category = mysqli_fetch_assoc($categories)) { ?>

                <option value="<?php echo $category['id']; ?>">
                    <?php echo $category['name']; ?>
                </option>

            <?php } ?>

        </select>

        <br><br>

        <label>Album Name</label>
        <input type="text" name="album_name" required>

        <br><br>

        <label>Version</label>
        <input type="text" name="version">

        <br><br>

        <label>Description</label>
        <textarea name="description"></textarea>

        <br><br>

        <label>Price</label>
        <input type="number" name="price" step="0.01" required>

        <br><br>

        <label>Stock Quantity</label>
        <input type="number" name="stock_quantity" required>

        <br><br>

        <label>Image File Name</label>
        <input type="text" name="image">

        <br><br>

        <label>Release Date</label>
        <input type="date" name="release_date">

        <br><br>

        <button type="submit" name="add_product">
            Add Product
        </button>

    </form>

</body>

</html>