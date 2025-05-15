<?php
session_start();
$logged_in = isset($_SESSION['session_id']);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>S & the 3 Ms - Homepage</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
        <link rel="stylesheet" href="styleIndex.css">
    </head>
    <body>
        <header>
            <button id="nav-home"><img class="logo" src="ChatGPT Image 14 mag 2025, 19_01_17.png" alt="S & the 3 Ms logo" /></button>
            <h1>S & the 3 Ms</h1>
            <nav>
                <form method="post" action="#">
                    <button id="nav-crypto" <?= $logged_in ? '' : 'disabled' ?> onclick="location.href='crypto.php'">Crittografia</button>
                    <button id="nav-ar" <?= $logged_in ? '' : 'disabled' ?> onclick="location.href='ar.php'">Realt&aacute Aumentata</button>
                    <button id="nav-theory" <?= $logged_in ? '' : 'disabled' ?> onclick="location.href='theory.php'">Teoria</button>
                </form>
                <?php if (!$logged_in): ?>
                    <a href="register.html"><button id="nav-register">Register</button></a>
                    <a href="login.html"><button id="nav-login">Login</button></a>
                    <button id="nav-logout" disabled>Logout</button>
                <?php else: ?>
                    <button id="nav-register" disabled>Register</button>
                    <button id="nav-login" disabled>Login</button>
                    <a href="logout.php"><button id="nav-logout">Logout</button></a>
                <?php endif; ?>
            </nav>
        </header>

        <section id="home-page">
            <h2>Benvenuto!</h2>
            <p>Usa il men&ugrave; in alto per navigare tra le pagine o fare il login.</p>
        </section>

        <section id="servizi">
            <h2>I nostri Sviluppatori</h2>
            <ul>
                <li>Sebastiano Stefani</li>
                <li>Martino Loperfido</li>
                <li>Matteo Rampazzo</li>
                <li>Mattia Valvason detto Sarodine</li>
            </ul>
        </section>

        <section id="contatti">
            <h2>Contattaci su Instagram:</h2>
            <ul>
                <li><a href="https://www.instagram.com/_sebastiano.stefani_/">@_sebastiano.stefani_</a></li>
                <li><a href="https://www.instagram.com/martino_loperfido/">@martino_loperfido</a></li>
                <li><a href="https://www.instagram.com/matteoo.rrampazzo/">@matteoo.rrampazzo</a></li>
                <li><a href="https://www.instagram.com/valvasonmattia/">@valvasonmattia</a></li>
            </ul>
        </section>

        <footer>
            <p>&copy; 2025 S & the 3 Ms. Tutti i diritti riservati.</p>
        </footer>
    </body>
</html>