<!DOCTYPE html>
<!--
Author: Luuk Vesters
Date: 12/6/2023
File: edit.php
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
            ?>
        </header>
        <main>
            <div id="content-container">
                <?php
                    // haal de waardes op
                    $activity = $_POST['Name'];
                    $startDate = date("Y-m-d h:i", strtotime($_POST["Start"]));
                    $endDate = date("Y-m-d h:i", strtotime($_POST["End"]));
                    $location = $_POST['Location'];
                    $id = $_POST['ActivityID'];



                    // Maak een variabele met de SQL query
                    $query = "UPDATE Activity SET [Name]  = '". $activity .  "', [Start] = '". $startDate . "', [End] = '". $endDate ."', [Location] = '". $location ."' WHERE ActivityID = ". $id ;

                    // Voer de query uit
                    $result = executeQuery($query);
                    $rowsAffected = executeInsertQuery($query);

                    if ($rowsAffected > 0)
                    {
                        echo "De activiteit is aangepast";
                    }
                    else
                    {
                        echo "Er iets mis gegaan.";
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
