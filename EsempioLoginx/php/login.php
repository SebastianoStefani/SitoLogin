<?php
session_start();
require_once('database.php');

// Check if user is already logged in
if (isset($_SESSION['session_id'])) {
    echo "Hai già effettuato l'accesso. Per favore, esci prima.";
    echo '<br><a href="logout.php">Logout</a>';
    exit;
}

// Check if login form has been submitted
if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if username and password are not empty
    if (empty($username) || empty($password)) {
        echo 'Compila tutti i campi';
    } else {
        // Prepare SQL query to retrieve user data
        $query = "SELECT username, password FROM login WHERE username = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        // Check if user exists
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $usernameDB = $row['username'];
            $passwordDB = $row['password'];

            // Check if password is correct
            if (password_verify($password, $passwordDB)) {
                // Create session
                session_regenerate_id();
                $_SESSION['session_id'] = session_id();
                $_SESSION['session_user'] = $usernameDB;
                header('Location: dashboard.php');
                exit;
            } else {
                echo 'Incorrect password.';
            }
        } else {
            echo 'User not found.';
        }
    }
}
echo '<br><a href="login.html">Back to login</a>';
?>