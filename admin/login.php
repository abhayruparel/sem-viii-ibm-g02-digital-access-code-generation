<?php
require('../config.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form input
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Get user record from database
    $stmt = $con->prepare("SELECT id, password, saltvalue, verified FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $hashedPassword, $saltvalue, $verified);
        $stmt->fetch();

        // Verify password
        $iterations = 1000;
        $sizeOfHash = 64;
        $inputPasswordHashed = hash_pbkdf2("sha512", $password, $saltvalue, $iterations, $sizeOfHash);

        if ($inputPasswordHashed === $hashedPassword) {
            // Password is correct and user is verified, set session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $email;
            header('location: index.php');
            exit();
        } else {
            $errorMessage = "Invalid email or password.";
        }
    } else {
        $errorMessage = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
    </head>

    <body>
        <h1>Login</h1>
        <?php if (isset($errorMessage)): ?>
            <p><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <label>Email:</label>
            <input type="email" name="email" required>
            <br>
            <label>Password:</label>
            <input type="password" name="password" required>
            <br>
            <button type="submit">Login</button>
        </form>
        <p>New User? <a href="register.php">SIGN-UP</a>
    </body>

</html>