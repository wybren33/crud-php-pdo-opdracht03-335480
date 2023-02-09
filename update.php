<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Verbinding";
    } else {
        // echo "Interne error";
    }
} catch(PDOException $e) {
    $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    try {
    $sql = "UPDATE Persoon
            SET    Voornaam = :voornaam
                   ,Tussenvoegsel = :tussenvoegsel
                   ,Achternaam = :achternaam
                   ,telefoonnummer = :telefoonnummer
                   ,straatnaam = :straatnaam
                   ,huisnummer = :huisnummer
                   ,woonplaats = :woonplaats
                   ,postcode = :postcode
                   ,landnaam = :landnaam
            WHERE Id = :id;";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
    $statement->bindValue(':voornaam', $_POST['firstname'], PDO::PARAM_STR);
    $statement->bindValue(':tussenvoegsel', $_POST['infix'], PDO::PARAM_STR);
    $statement->bindValue(':achternaam', $_POST['lastname'], PDO::PARAM_STR);
    $statement->bindValue(':telefoonnummer', $_POST['telefoonnummer'], PDO::PARAM_INT);
    $statement->bindValue(':straatnaam', $_POST['straatnaam'], PDO::PARAM_STR);
    $statement->bindValue(':huisnummer', $_POST['huisnummer'], PDO::PARAM_INT);
    $statement->bindValue(':woonplaats', $_POST['woonplaats'], PDO::PARAM_STR);
    $statement->bindValue(':postcode', $_POST['postcode'], PDO::PARAM_STR);
    $statement->bindValue(':landnaam', $_POST['landnaam'], PDO::PARAM_STR);

    $statement->execute();

    echo "Hij is geupdate";

    header('Refresh:3; url=read.php');
    exit();
    } catch(PDOException $e) {
        echo "Het record is niet geupdat, Probeer het opnieuw";
        header('Refresh:3; url=read.php');
    }
} 

$sql = "SELECT Id
              ,Voornaam as VN
              ,Tussenvoegsel as TV
              ,Achternaam as AN
        FROM Persoon
        WHERE Id = :Id";

$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['id'], PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PDO CRUD</title>
</head>
<body>
    <h3>Wijzig het record</h3>

    <form action="update.php" method="post">
        <label for="firstname">Voornaam:</label><br>
        <input type="text" id="firstname" name="firstname" value="<?= $result->VN ?>"><br>
        <br>
        <label for="infix">Tussenvoegsel:</label><br>
        <input type="text" id="infix" name="infix" value="<?= $result->TV ?>"><br>
        <br>
        <label for="lastname">Achternaam:</label><br>
        <input type="text" id="lastname" name="lastname" value="<?= $result->AN ?>"><br>
        <br>
        <label for="telefoonnummer">Telefoonnummer:</label><br>
        <input type="tel" id="telefoonnummer" name="telefoonnummer"><br>
        <br>
        <label for="straatnaam">Straatnaam:</label><br>
        <input type="text" id="straatnaam" name="straatnaam"><br>
        <br>
        <label for="huisnummer">Huisnummer:</label><br>
        <input type="text" id="huisnummer" name="huisnummer"><br>
        <br>
        <label for="woonplaats">Woonplaats:</label><br>
        <input type="text" id="woonplaats" name="woonplaats"><br>
        <br>
        <label for="postcode">Postcode:</label><br>
        <input type="text" id="postcode" name="postcode"><br>
        <br>
        <label for="landnaam">Landnaam:</label><br>
        <input type="text" id="landnaam" name="landnaam"><br>
        <br>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="submit" value="Verstuur">

    </form>    
</body>
</html>

