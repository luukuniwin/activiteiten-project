<!DOCTYPE html>
<!--
Author: Luuk Vesters
Date: 12/6/2023
File: overzicht.php
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Login - Sportacademie</title>
        <link rel="stylesheet" href="../styles/stylesheet.css">
        <title>
            Sport Activiteiten KW1C | Overzicht
        </title>
        </head>
    <body>
        <header>
            <?php
            $path = "../";
            $active = "3";
            session_start();
            include "../includes/db-functions.php";
            include "../includes/nav.php";
            startConnection();
            ?>
        </header>
        <main>
            <div class="content">
                <h1>
                    Activiteiten
                </h1>
                <fieldset>
                    <legend>Zoeken</legend>
                    <form action='overzicht.php' method='post'>
                        <label for="activityLocation">Activiteitnaam of Locatie</label><br><br>
                        <input type="text" name="activityLocation">
                        <br><br>
                        <input class="button-style-1" type='submit' value='Zoeken'>
                    </form>
                </fieldset><br>
                <?php
                // If else voor het zoeken als er niks is ingevuld laat hij alles zien
                if(empty($_POST['activityLocation']))
                {
                    $query = "SELECT * FROM Activity ORDER BY Start DESC";
                }
                else if(isset($_POST['activityLocation']))
                {
                    $query = "SELECT * FROM Activity WHERE [Name] LIKE '%" . $_POST["activityLocation"]. "%' OR Location LIKE '%" . $_POST["activityLocation"]. "%' ORDER BY Start DESC";
                }
                $result = executeQuery($query);

                if (isset($_SESSION['username']))
                {
                    echo '<a class="button-style-1" href="addForm.php">Activiteit Toevoegen</a><br><br>';
                }
                // Text die vast staat in het tabel.
                echo "<table>";
                echo "<tr>";
                echo "<th>ActivityID</th>";
                echo "<th>Activiteit</th>";
                echo "<th>Start:</th>";
                echo "<th>Einde:</th>";
                echo "<th>Location:</th>";
                if (isset($_SESSION['username']))
                {
                    echo "<th>Bewerk</th>";
                    echo "<th>Verwijder</th>";
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
                        echo "<td>" . "<a href='editForm.php?ActivityID=". $row['ActivityID']. "' class='button-style-2'>Bewerk</a></td>";
                        echo "<td>" . "<a href='delete.php?ActivityID=". $row['ActivityID']. "' class='button-style-2'>Verwijder</a></td>";
                    }
                    echo "</tr>";
                }
                else
                {
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
                }
                echo "</table>";
                ?>
                </p>
            </div>
            <?php
            // include footer
            include "../includes/footer.php";
            ?>
        </main>
    </body>
</html>
