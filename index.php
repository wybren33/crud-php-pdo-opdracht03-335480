<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Achtbanen</title>
</head>

<body>
    <h3>De 5 snelste achtbanen van Europa</h3>

    <form action="create.php" method="post">
        <label for="achtbaan">Naam Achtbaan:</label><br>
        <input type="text" id="achtbaan" name="achtbaan"><br>
        <br>
        <label for="pretpark">Naam Pretpark:</label><br>
        <input type="text" id="pretpark" name="pretpark"><br>
        <br>
        <label for="land">Naam Land:</label><br>
        <input type="text" id="land" name="land"><br>
        <br>
        <label for="snelheid">Topsnelheid (km/u):</label><br>
        <input type="number" id="snelheid" name="snelheid"><br>
        <br>
        <label for="hoogte">Hoogte (m):</label><br>
        <input type="number" id="hoogte" name="hoogte"><br>
        <br>
        <label for="datum">Datum eerste opening:</label><br>
        <input type="date" id="datum" name="datum"><br>
        <br>
        <label for="cijfer">Cijfer voor achtbaan:</label><br>
        <input type="range" min="1" max="10" step="0.1" value="5" id="cijfer" name="cijfer">
        <output id="valueDisplay">5</output>
        <br>
        <input value="Sla op" type="submit">
    </form>




</body>
    <script src="script.js"></script>
</html>