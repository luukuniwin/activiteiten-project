<?php
// Author: Luuk Vesters
// Date: 12/6/2023
// File: index.php
?>

<footer>
    &copy; Koning Willem 1 College |
    <?php
    // Als gebruiker is ingelogd wordt de username weergeven
    if (isset($_SESSION['username']))
    {
            echo "Ingelogd als ". $_SESSION['username']. " | ";
    }
    else
        {
            echo "Niet Ingelogd | ";
        }

    // Stel de tijdzone in op de gewenste waarde
    date_default_timezone_set('Europe/Amsterdam');
    // Haal de huidige datum en tijd op
    $nu = time();
    // Formatteer de datum en tijd met de maand
    $datumTijd = strftime("%e %B, %H:%M", $nu);
    // Echo de datum en tijd
    echo $datumTijd;


    ?>
</footer>
