<!DOCTYPE html>
    <!--
    Author: Luuk Vesters
    Date: 12/6/2023
    File: addForm.php
    -->
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="UTF-8">
            <title>
                Sport Activiteiten KW1C | Activiteit Toevoegen
            </title>
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
                // Terug naar login pagina als gebruiker niet is ingelogd
                if (!isset($_SESSION['username']))
                {
                    header("location: login.php");
                }
            ?>
        </header>
        <main>
            <div id="form-container">
                <fieldset>
                    <legend>Nieuwe Activiteit Toevoegen</legend>
                    <br>
                    <form action="add.php" method="get">
                        <label for="Name">Activiteit Naam</label><br>
                        <input required type="text" name="Name"<br><br><br>
                        <label for="Start">Start Moment</label><br>
                        <input required type="datetime-local" name="Start"><br><br>
                        <label for="End">Eind Moment</label><br>
                        <input required type="datetime-local" name="End"><br><br>
                        <label for="Location">Locatie</label>
                        <input required type="text" name="Location"><br><br>
                        <input class='button-style-2' type="submit" value="Opslaan">
                    </form>
                </fieldset><br>
                <a href='overzicht.php' class='button-style-2'>Terug</a>
            </div>
            <?php
            // include footer
            include "../includes/nav.php";
            ?>
        </main>
    </body>
</html>
