<!DOCTYPE html>
<!--
Author: Luuk Vesters
Date: 12/6/2023
File: editform.php
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
            // Start een connectie met de database
            $path = "../";
            $active = "";
            session_start();
            include "../includes/db-functions.php";
            include "../includes/nav.php";
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

                // Start een connectie met de database
                startConnection();

                // Maak een variabele met de SQL query
                $query = "SELECT * FROM Activity WHERE ActivityID =". $_GET['ActivityID'];

                // Voer de query uit
                $result = executeQuery($query);

                $record = $result->fetch(PDO::FETCH_ASSOC);
                ?>
                <fieldset>
                    <legend>Activiteit Bewerken</legend>
                    <br>
                    <form action="edit.php" method="post">
                        <label for="Name">Activiteit Naam</label>
                        <input required type="text" name="Name" value="<?php echo $record['Name']?>"><br><br>
                        <label for="Start">Start Moment</label><br>
                        <input required type="datetime-local" name="Start" value="<?php echo $record['Start']?>"><br><br>
                        <label for="End">Eind Moment</label><br>
                        <input required type="datetime-local" name="End" value="<?php echo $record['End']?>"><br><br>
                        <label for="Location">Locatie</label>
                        <input required type="text" name="Location" value="<?php echo $record['Location']?>"><br><br>
                        <input class='button-style-2' type="submit" value="Opslaan">
                        <input type="hidden" name="ActivityID" value="<?php echo $_GET['ActivityID'] ?>">
                    </form><br>
                    <a class='button-style-2' href="overzicht.php">Terug</a>
                </fieldset><br>
            </div>
            <?php
                // include footer
                include "../includes/footer.php";
            ?>
        </main>
    </body>
</html>
