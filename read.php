<?php
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
    } else {
        echo "Interne server-error. Probeer het later nog eens";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

$sql = "SELECT Id
                  ,achtbaan
                  ,pretpark
                  ,land
                  ,snelheid
                  ,hoogte
                  ,datum
                  ,cijfer
            FROM achtbaan
            ORDER BY Id";

$statement = $pdo->prepare($sql);

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                    <td>$info->Id</td>
                    <td>$info->achtbaan</td>
                    <td>$info->pretpark</td>
                    <td>$info->land</td>
                    <td>$info->snelheid</td>
                    <td>$info->hoogte</td>
                    <td>$info->datum</td>
                    <td>$info->cijfer</td>
                    <td>
                        <a href='delete.php?id={$info->Id}'>
                            <img src='img/b_drop.png' alt='kruis'>
                        </a>
                    </td>
                    <td>
                    <a href='update.php?id={$info->Id}'>
                        <img src='img/b_edit.png' alt='pencil'>
                    </a>
                    </td>
                  </tr>";
}
?>

<h3>Persoonsgegevens</h3>
<a href="index.php"><input type="button" value="Nieuw persoon"></a>
<br><br>
<table border="1">
    <thead>
        <th>Id</th>
        <th>achtbaan</th>
        <th>pretpark</th>
        <th>land</th>
        <th>snelheid</th>
        <th>hoogte</th>
        <th>datum</th>
        <th>cijfer</th>
        <th></th>
        <th></th>
    </thead>
    <tbody>
        <?= $rows; ?>
    </tbody>
</table>