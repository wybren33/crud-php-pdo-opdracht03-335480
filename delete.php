<?php

require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        echo "Er is verbinding gemaakt";
    } else {
        echo "Interne server-error";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "DELETE FROM Persoon
        WHERE Id = :Id";

$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['id'], PDO::PARAM_INT);

$result = $statement->execute();

if ($result) {
    echo "<br>Het verwijderen van het record met id = {$_GET['id']} is gelukt";
} else {
    echo "Interne server-error, Record is niet verwijderd...";
}

header('Refresh:3; url=read.php');
