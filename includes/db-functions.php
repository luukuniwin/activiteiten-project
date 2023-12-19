<?php
/**
 * User: Luuk Vesters
 * Date: 12/6/2023
 * File: db-functions.php
 */
// Een "leeg" $pdo variabele aanmaken
$pdo = null;

// Starten van een DB connectie
function startConnection()
{
    global $pdo;
    // Open de database connectie en ODBC driver
    try
    {
        $pdo = new PDO("odbc:odbcProjectSqlserver");

    }
    catch (PDOException $e)
    {
        echo "<h1>Database error:</h1>";
        echo $e->getMessage();
        die();
    }
}

// Uitvoeren van een query
function executeQuery($sql)
{
    global $pdo;
    // Uitvoeren van een SQl query
    try
    {
        // Query uitvoeren
        $result = $pdo->query($sql);

        return $result;
    }
    catch (PDOException $e)
    {
        echo 'Er is een probleem met ophalen van de database: ' . $e->getMessage();
        exit();
    }
}

function executeInsertQuery($query)
{
    global $pdo;

    try
    {
        $rowsAffected = $pdo->exec($query);
    }
    catch(PDOException $error)
    {
        $rowsAffected = 0;
        echo "<p>Er is een error opgetreden: ". $error->getMessage() . "</p>";
    }

    return $rowsAffected;
}
?>