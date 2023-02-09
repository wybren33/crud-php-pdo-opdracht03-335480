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
    $sql = "UPDATE achtbaan
            SET    achtbaan = :achtbaan
                   ,pretpark = :pretpark
                   ,land = :land
                   ,snelheid = :snelheid
                   ,hoogte = :hoogte
                   ,datum = :datum
                   ,cijfer = :cijfer
            WHERE Id = :id;";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
    $statement->bindValue(':achtbaan', $_POST['achtbaan'], PDO::PARAM_STR);
    $statement->bindValue(':pretpark', $_POST['pretpark'], PDO::PARAM_STR);
    $statement->bindValue(':land', $_POST['land'], PDO::PARAM_STR);
    $statement->bindValue(':snelheid', $_POST['snelheid'], PDO::PARAM_INT);
    $statement->bindValue(':hoogte', $_POST['hoogte'], PDO::PARAM_INT);
    $statement->bindValue(':datum', $_POST['datum'], PDO::PARAM_STR);
    $statement->bindValue(':cijfer', $_POST['cijfer'], PDO::PARAM_INT);

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
              ,achtbaan as AB
              ,pretpark as PP
              ,land as L
        FROM achtbaan
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
        <label for="achtbaan">achtbaan:</label><br>
        <input type="text" id="achtbaan" name="achtbaan" value="<?= $result->AB ?>"><br>
        <br>
        <label for="pretpark">pretpark:</label><br>
        <input type="text" id="pretpark" name="pretpark" value="<?= $result->PP ?>"><br>
        <br>
        <label for="land">:land</label><br>
        <input type="text" id="land" name="land" value="<?= $result->L ?>"><br>
        <br>
        <label for="snelheid">snelheid:</label><br>
        <input type="number" id="snelheid" name="snelheid"><br>
        <br>
        <label for="hoogte">hoogte:</label><br>
        <input type="number" id="hoogte" name="hoogte"><br>
        <br>
        <label for="datum">datum:</label><br>
        <input type="date" id="datum" name="datum"><br>
        <br>
        <label for="cijfer">cijfer:</label><br>
        <input type="range" min="1" max="10" step="0.1" value="5" id="cijfer" name="cijfer">
        <output id="valueDisplay">5</output>
        <br>
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <input type="submit" value="Verstuur">

    </form>    
</body>
    <script src="script.js"></script>
</html>

