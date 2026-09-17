<?php

session_start();

include "includes/db.php";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]++;
    } else {
        $_SESSION['cart'][$id] = 1;
    }
}

include "includes/header.php";

?>

<h1>Your Cart</h1>

<?php

$total = 0;

if (empty($_SESSION['cart'])) {

    echo "<p>Your cart is empty.</p>";

} else {

    foreach ($_SESSION['cart'] as $id => $quantity) {

        $sql = "SELECT products.*, artists.name AS artist_name
                FROM products
                JOIN artists ON products.artist_id = artists.id
                WHERE products.id = $id";

        $result = mysqli_query($conn, $sql);
        $product = mysqli_fetch_assoc($result);

       if ($product) {

    $subtotal = $product['price'] * $quantity;
    $total = $total + $subtotal;

    echo '<div class="cart-item">';

    echo "<h2>" . $product['album_name'] . "</h2>";
    echo "<p>" . $product['artist_name'] . "</p>";
    echo "<p>Quantity: " . $quantity . "</p>";
    echo "<p>Price: LKR " . number_format($subtotal, 2) . "</p>";

    echo '</div>';
}
    }

    echo '<div class="cart-total">';

echo "<h2>Total: LKR " . number_format($total, 2) . "</h2>";

echo '<button>Proceed to Checkout</button>';

echo '</div>';
}

?>

<?php include "includes/footer.php"; ?>