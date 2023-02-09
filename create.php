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

$sql = "INSERT INTO Persoon (Id
                            ,Voornaam
                            ,Tussenvoegsel
                            ,Achternaam
                            ,telefoonnummer
                            ,straatnaam
                            ,huisnummer
                            ,woonplaats
                            ,postcode
                            ,landnaam)
        VALUES              (NULL
                            ,:firstname
                            ,:infix
                            ,:lastname
                            ,:telefoonnummer
                            ,:straatnaam
                            ,:huisnummer
                            ,:woonplaats
                            ,:postcode
                            ,:landnaam);";

$statement = $pdo->prepare($sql);

$statement->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
$statement->bindValue(':infix', $_POST['infix'], PDO::PARAM_STR);
$statement->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
$statement->bindValue(':telefoonnummer', $_POST['telefoonnummer'], PDO::PARAM_INT);
$statement->bindValue(':straatnaam', $_POST['straatnaam'], PDO::PARAM_STR);
$statement->bindValue(':huisnummer', $_POST['huisnummer'], PDO::PARAM_INT);
$statement->bindValue(':woonplaats', $_POST['woonplaats'], PDO::PARAM_STR);
$statement->bindValue(':postcode', $_POST['postcode'], PDO::PARAM_STR);
$statement->bindValue(':landnaam', $_POST['landnaam'], PDO::PARAM_STR);

$statement->execute();

echo "Het opslaan is gelukt";
header('Refresh:4; url=read.php');
