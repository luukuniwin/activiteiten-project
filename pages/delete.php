<!DOCTYPE html>
<!--
Author: Luuk Vesters
Date: 12/6/2023
File: delete.php
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
            $path = "../";
            $active = "";
            session_start();
            include "../includes/db-functions.php";
            include "../includes/nav.php";
            startConnection();
            // Terug naar login pagina als gebruiker niet is ingelogd
            if (!isset($_SESSION['username']))
            {
                header("location: login.php");
            }
            ?>
        </header>
        <main>
            <div id="content-container">
                <?php
                // Maak een variabele met de SQL query
                $query = "DELETE FROM Activity WHERE ActivityID =". $_GET['ActivityID'] ;

                // Voer de query uit
                $result = executeQuery($query);
                $rowsAffected = executeInsertQuery($query);

                if ($rowsAffected > 0)
                {
                    echo "De activiteit is verwijderd";
                }
                else
                {
                    echo "De activiteit is verwijderd";
                }
                echo "<br><br>";
                echo "<a href='overzicht.php' class='button-style-2'>Terug</a>"
                ?>
            </div>
            <?php
                include "../includes/footer.php";
            ?>
        </main>
    </body>
</html>
