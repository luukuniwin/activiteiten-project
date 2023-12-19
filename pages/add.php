<!DOCTYPE html>
<!--
Author: Luuk Vesters
Date: 12/6/2023
File: add.php
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Login - Sportacademie</title>
        <link rel="stylesheet" href="../styles/stylesheet.css">
        <title>
            Login
        </title>
    </head>
    <body>
        <header>
            <?php
            $active = "";
            $path = "../";
            // Start een connectie met de database
            session_start();
            include "../includes/db-functions.php";
            include "../includes/nav.php";
            startConnection();
            ?>
        </header>
        <main>
            <div id="content">
                <?php
                // Terug naar login pagina als gebruiker niet is ingelogd
                if (!isset($_SESSION['username']))
                {
                    header("location: login.php");
                }
                // Zet de tijd in het goede format
                $startDate = date("Y-m-d h:i", strtotime($_GET["Start"]));
                $endDate = date("Y-m-d h:i", strtotime($_GET["End"]));
                // query voor de database
                $query = "INSERT INTO Activity VALUES ('". $_GET["Name"] . "', '". $startDate . "', '". $endDate . "', '". $_GET["Location"] . "')";
                // Check of er iets is aangepast
                $rowsAffected = executeInsertQuery($query);
                if($rowsAffected > 0)
                {
                    echo "<p>De activiteit is opgeslagen in de database</p>";
                }
                else
                {
                    echo "<p>Er is iets fout gegaan. Probeer het opnieuw.</p>";
                }
                echo "<a href='overzicht.php' class='button-style-2'>Terug</a>";
                // include footer
                include "../includes/nav.php";
                ?>
            </div>
        </main>
    </body>
</html>
