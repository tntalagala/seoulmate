<?php

include "includes/db.php";
include "includes/header.php";

$sql = "SELECT products.*, artists.name AS artist_name
        FROM products
        JOIN artists ON products.artist_id = artists.id";

$result = mysqli_query($conn, $sql);

?>

<h1>Shop K-pop Albums</h1>

<div class="product-grid">

<?php while ($product = mysqli_fetch_assoc($result)) { ?>

    <div class="product-card">

        <img src="images/<?php echo $product['image']; ?>" alt="Album">

        <h2><?php echo $product['album_name']; ?></h2>

        <p><?php echo $product['artist_name']; ?></p>

        <p>LKR <?php echo number_format($product['price'], 2); ?></p>

        <a href="product.php?id=<?php echo $product['id']; ?>">
            View Details
        </a>

    </div>

<?php } ?>

</div>

<?php include "includes/footer.php"; ?>