<?php

include "includes/db.php";

if (!isset($_GET['id'])) {
    die("Product not found.");
}

$id = $_GET['id'];

$sql = "SELECT products.*, artists.name AS artist_name
        FROM products
        JOIN artists ON products.artist_id = artists.id
        WHERE products.id = $id";

$result = mysqli_query($conn, $sql);

$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Product not found.");
}

include "includes/header.php";

?>

<div class="product-details">

    <div>
        <img src="images/<?php echo $product['image']; ?>" alt="Album">
    </div>

    <div>

        <p><?php echo $product['artist_name']; ?></p>

        <h1><?php echo $product['album_name']; ?></h1>

        <p><?php echo $product['description']; ?></p>

        <p>Version: <?php echo $product['version']; ?></p>

        <h2>LKR <?php echo number_format($product['price'], 2); ?></h2>

        <p>Stock: <?php echo $product['stock_quantity']; ?></p>

        <a href="cart.php?id=<?php echo $product['id']; ?>">
    Add to Cart
</a>

    </div>

</div>

<?php include "includes/footer.php"; ?>