<?php

include "includes/db.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact_messages (name, email, subject, message)
            VALUES ('$name', '$email', '$subject', '$message')";

    mysqli_query($conn, $sql);

    $success = "Your message has been sent successfully.";
}

include "includes/header.php";

?>

<section>

    <h1>Contact Us</h1>

    <p>Have a question? Send us a message and we will get back to you.</p>

    <?php if (isset($success)) { ?>
        <p><?php echo $success; ?></p>
    <?php } ?>

   <form method="POST" class="contact-form">

        <label>Name</label>
        <input type="text" name="name" required>

        <br><br>

        <label>Email</label>
        <input type="email" name="email" required>

        <br><br>

        <label>Subject</label>
        <input type="text" name="subject">

        <br><br>

        <label>Message</label>
        <br>
        <textarea name="message" rows="5" required></textarea>

        <br><br>

        <button type="submit" name="submit">Send Message</button>

    </form>

</section>

<?php include "includes/footer.php"; ?>