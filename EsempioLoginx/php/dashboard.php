<?php
session_start();
require_once('database.php');

// Controllo sessione valido prima di mostrare la dashboard
if (!isset($_SESSION['session_id']) || !isset($_SESSION['session_user'])) {
    echo "Sessione non valida. <a href='login.html'>Accedi</a>";
    exit;
}

$session_user = htmlspecialchars($_SESSION['session_user'], ENT_QUOTES, 'UTF-8');
$session_id = htmlspecialchars($_SESSION['session_id']);
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styleDashboard.css">
</head>
<body>
    <header>
            <button id="nav-home"><img class="logo" src="ChatGPT Image 14 mag 2025, 19_01_17.png" alt="S & the 3 Ms logo, stylized, BLUE, with white background" /></button>
            <h1>S & the 3 Ms</h1>
            <nav>
                <button id="nav-crypto" disabled>Crittografia</button>
                <button id="nav-ar" disabled>Realt&aacute Aumentata</button>
                <button id="nav-theory" disabled>Teoria</button>
                <a href="register.html"><button id="nav-register">Register</button></a>
                <a href="login.html"><button id="nav-login">Login</button></a>
                <button id="nav-logout" disabled>Logout</button>

            </nav>
        </header>    
    <h1>Benvenuto <?php echo $session_user; ?>!</h1>
    <p>Il tuo session ID è <?php echo $session_id; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
