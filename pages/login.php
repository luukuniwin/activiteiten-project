<!DOCTYPE html>
<!--
    Author: Luuk Vesters
    Date: 12/6/2023
    File: login.php
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Login - Sportacademie</title>
        <link rel="stylesheet" href="../styles/stylesheet.css">
        <title>
            Sport Activiteiten KW1C | Login
        </title>
    </head>
    <body>
        <header>
            <?php
            $path = "../";
            $active = "2";
            session_start();
            include "../includes/db-functions.php";
            include "../includes/nav.php";
            ?>
        </header>
        <main>
            <div id="form-container">
                <!-- Login form -->
                <form id="login-form" action="../includes/login-function.php" method="post">
                    <h2>Login</h2>
                    <!-- Error message if someone uses wrong login or tries to go to dashboard without logging in.-->
                    <?php if (isset($_GET['error'])) { ?>
                        <p id="error-message"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <div class="form-group">
                        <label for="username">Gebruikersnaam</label><br>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Wachtwoord</label><br>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="button-style-1">Login</button>
                </form>
            </div>
            <div class="content">
                <p>
                    Je moet inloggen om toegang te krijgen tot het toevoegen, bewerken en verwijderen van activiteiten. <br>Log in om toegang te krijgen tot het toevoegen, bewerken en verwijderen van activiteiten.
                </p>
            </div>
            <?php
                include "../includes/footer.php";
            ?>
        </main>
    </body>
</html>
