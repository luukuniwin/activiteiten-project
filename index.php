<!DOCTYPE html>
<!--
Author: Luuk Vesters
Date: 12/6/2023
File: index.php
-->
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/stylesheet.css">
        <title>
            Sport Activiteiten KW1C | Home
        </title>
    </head>
    <body>
        <header>
            <?php
                $path = "";
                $active = "1";
                session_start();
                include "includes/db-functions.php";
                include "includes/nav.php";
                startConnection();
            ?>
        </header>
        <main>
            <div class="content">
                <img id="headerImg" src="images/sport.jpg" alt="Header Image">
                <h2>
                    Wat bieden wij
                </h2>
                <p>
                    Verscheidenheid aan sportactiviteiten<br>
                    Professionele begeleiding door onze sportcoördinatoren<br>
                    Gevarieerd lesrooster voor jouw gemak<br>
                    Gratis deelname voor studenten van het Koning Willem 1 College<br>
                </p>
                <h2>
                    Hoe werkt het
                </h2>
                <p>
                    Bekijk het overzicht van komende activiteiten<br>
                    Kies een activiteit die jou aanspreekt<br>
                    Meld je aan en reserveer jouw plek<br>
                    Kom op het aangegeven tijdstip naar de aangegeven locatie<br>
                    Geniet van de sportieve en gezellige sfeer!<br>
                </p><br>
                <p>
                    Je moet inloggen om toegang te krijgen tot het toevoegen, bewerken en verwijderen van activiteiten. <br>Log in om toegang te krijgen tot het toevoegen, bewerken en verwijderen van activiteiten.
                </p><br>
            </div>
            <?php
                // haal gegevens op uit de database
                $query = "SELECT TOP 3 * FROM Activity ORDER BY Start DESC;";
                $result = executeQuery($query);

                echo "<table>";
                echo "<tr>";
                echo "<th>ActivityID</th>";
                echo "<th>Activiteit</th>";
                echo "<th>Start:</th>";
                echo "<th>Einde:</th>";
                echo "<th>Location:</th>";
                // door de results gaan met een while
                while ($row = $result->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<tr>";
                    echo "<td> " . $row["ActivityID"] . " </td>";
                    echo "<td> " . $row["Name"] . " </td>";
                    echo "<td> " . $row["Start"] . " </td>";
                    echo "<td> " . $row["End"] . "</td>";
                    echo "<td> " . $row["Location"];
                }
                echo "</tr>";
                echo "</tr>";
                // door de results gaan met een while
                while ($row = $result->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<tr>";
                    echo "<td> " . $row["ActivityID"] . " </td>";
                    echo "<td> " . $row["Name"] . " </td>";
                    echo "<td> " . $row["Start"] . " </td>";
                    echo "<td> " . $row["End"] . "</td>";
                    echo "<td> " . $row["Location"];
                }
                echo "</tr>";
            // include footer
            include "includes/footer.php";
            ?>
        </main>
    </body>
</html>