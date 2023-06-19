<?php
session_start();

require_once 'connection.php'; // Include the connection.php file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    // Check if the admin exists
    $query = $db->prepare("SELECT * FROM admins WHERE name = :username");
    $query->bindParam(':username', $username);
    $query->execute();

    if ($query->rowCount() === 1) {
        $admin = $query->fetch(PDO::FETCH_ASSOC);

        // Verify the password
        if (password_verify($password, $admin['password'])) {
            // Set session variables
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];

            // Redirect to index.php after successful login
            header("Location: index.php");
            exit();
        }
    }

    // If login fails, display an error message
    echo "Invalid username or password";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Marefiya Hotel</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="page">
    <main class="main page__main">
        <form class="login-form main__login-form" action="login.php" method="POST">
            <h3 class="login-form__title">Sign In</h3>
            <label class="login-form__label" for="uname">
                <span class="sr-only">Username</span>
                <input class="login-form__input" id="uname" type="text" name="uname" placeholder="Username"
                    required="required" />
            </label>
            <label class="login-form__label" for="psw">
                <span class="sr-only">Password</span>
                <input class="login-form__input" id="psw" type="password" name="psw" placeholder="Password"
                    required="required" />
            </label>
            <button class="primary-btn" type="submit">Login</button>
            <div class="login-form__footer">
                <a class="login-form__link" href="#">Forget Password?</a>
                <a class="login-form__link" href="signup.php">Sign Up</a>
            </div>
        </form>
    </main>
</body>

</html>
