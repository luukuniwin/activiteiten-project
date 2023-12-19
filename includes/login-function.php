<?php
include "../includes/db-functions.php";
startConnection();

if (isset($_SESSION['username'])) {
    header("Location: login.php?error=Je bent al ingelogd, log uit om van account te veranderen");
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM [User] WHERE UserName = '$username' AND Password = '$password'";
        $result = executeQuery($query);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if (isset($user['UserName'])) {
            // Start een sessie en sla de gebruikersnaam op
            session_start();
            $_SESSION['username'] = $user['UserName'];

            // Redirect naar de homepagina of een andere gewenste pagina
            header("Location: ../pages/login.php");
            exit();
        } else {
            // Gebruiker niet gevonden, toon een foutmelding
            header("Location: ../pages/login.php?error=Ongeldige Login, probeer het opnieuw");
        }
    }
}

?>