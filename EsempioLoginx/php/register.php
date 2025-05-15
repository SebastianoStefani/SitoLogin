<?php
require_once('database.php');

// Check if the form has been submitted
if (isset($_POST['register'])) {
    // Get the form data
    $nome = trim($_POST['nome']);
    $cognome = trim($_POST['cognome']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $msg = '';

    // Validate the form data
    if (empty($nome) || empty($cognome) || empty($username) || empty($email) || empty($password)) {
        $msg = 'Compila tutti i campi';
    } elseif (!validatePassword($password)) {
        $msg = "La password deve essere lunga tra 8 e 12 caratteri e contenere almeno una lettera maiuscola, una lettera minuscola e un carattere speciale";
    } elseif (!validateUsername($username)) {
        $msg = 'L\'username può contenere solo lettere, numeri e underscore';
    } elseif (!validateName($nome)) {
        $msg = 'Il nome non può contenere caratteri speciali';
    } elseif (!validateName($cognome)) {
        $msg = 'Il cognome non può contenere caratteri speciali';
    } elseif (!validateLength($username, 4, 20)) {
        $msg = 'L\'username deve essere lungo tra i 4 e i 20 caratteri';
    } elseif (!validateLength($nome, 2, 20)) {
        $msg = 'Il nome deve essere lungo tra i 2 e i 20 caratteri';
    } elseif (!validateLength($cognome, 2, 20)) {
        $msg = 'Il cognome deve essere lungo tra i 2 e i 20 caratteri';
    } else {
        // Check if the username is already in use
        $recuperauser = mysqli_query($con, "SELECT id FROM login WHERE username='$username'") or die(mysqli_error($con));
        $num_user = mysqli_num_rows($recuperauser);
        if ($num_user > 0) {
            $msg = 'Username già in uso';
        } else {
            // Hash the password
            $password = password_hash($password, PASSWORD_DEFAULT);
            // Insert the user into the database
            $inserimentouser = mysqli_query($con, "INSERT INTO login (username, password, nome, cognome, email) VALUES('$username', '$password', '$nome', '$cognome', '$email')") or die(mysqli_error($con));
            if ($inserimentouser > 0) {
                $msg = 'Registrazione eseguita con successo';
            } else {
                $msg = 'Problemi con l\'inserimento dei dati';
            }
        }
    }
    print($msg);
    print('<a href="register.html">torna indietro</a>');
}

// Function to validate the password
function validatePassword($password) {
    return strlen($password) >= 8 && strlen($password) <= 12 && preg_match("/^(?=.*\d)(?=.*[.*@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z.*@#\-_$%^&+=§!\?]{8,12}$/", $password);
}

// Function to validate the username
function validateUsername($username) {
    return preg_match('/^[a-zA-Z0-9_]+$/', $username);
}

// Function to validate the name
function validateName($name) {
    return !preg_match("/[^a-zA-Z\d\s]/", $name);
}

// Function to validate the length of a string
function validateLength($string, $min, $max) {
    return strlen($string) >= $min && strlen($string) <= $max;
}
?>