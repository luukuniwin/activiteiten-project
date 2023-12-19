<?php
// Author: Luuk Vesters
// Date: 12/6/2023
// File: index.php
?>
<nav>
    <ul class="menu">
        <img class="logo" src="<?php echo $path; ?>images/logo.png">
        <li><a <?php if($active == "1"){echo "id='active'";} ?> href="<?php echo $path; ?>index.php">Home</a></li>
        <?php
        if (isset($_SESSION['username']))
        {
            echo "<li><a href='". $path ."pages/logout.php'>Uitloggen</a></li>";
        }
        else
        {
            echo "<li><a ";
            if($active == '2')
            {
                echo "id='active'";
            }
            echo " href='" . $path . "pages/login.php'>Login</a></li>";
        }
        ?>
        <li><a <?php if($active == "3"){echo "id='active'";} ?> href="<?php echo $path; ?>pages/overzicht.php">Overzicht</a></li>
    </ul>
</nav>