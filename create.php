<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
    } else {
        echo 'Interne servererror, neem contact op met de databasebeheerder';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "INSERT INTO achtbaan (Id
                            ,achtbaan
                            ,pretpark
                            ,land
                            ,snelheid
                            ,hoogte
                            ,datum
                            ,cijfer)
        VALUES              (NULL
                            ,:achtbaan
                            ,:pretpark
                            ,:land
                            ,:snelheid
                            ,:hoogte
                            ,:datum
                            ,:cijfer);";

$statement = $pdo->prepare($sql);

$statement->bindValue(':achtbaan', $_POST['achtbaan'], PDO::PARAM_STR);
$statement->bindValue(':pretpark', $_POST['pretpark'], PDO::PARAM_STR);
$statement->bindValue(':land', $_POST['land'], PDO::PARAM_STR);
$statement->bindValue(':snelheid', $_POST['snelheid'], PDO::PARAM_INT);
$statement->bindValue(':hoogte', $_POST['hoogte'], PDO::PARAM_INT);
$statement->bindValue(':datum', $_POST['datum'], PDO::PARAM_STR);
$statement->bindValue(':cijfer', $_POST['cijfer'], PDO::PARAM_INT);

$statement->execute();

echo "Het opslaan is gelukt";
header('Refresh:4; url=read.php');
