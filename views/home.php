<?php
session_start();
// als je niet ingelogd bent, dan word je doorverwezen naar de login.
if(empty($_SESSION['loggedInUser'])) {
    echo "<h2> Je bent niet ingelogd, Toegang geweigerd. Doorverwijzen...";
    header("refresh: 4; url= ../");
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <h1>Je bent op de homepage TA DA</h1>
   <!-- Als je niet bent ingelogd zorgt het ervoor dat je de inhoud niet kan zien -->
   

    <a href="./forms/lijst_v_zaken.php">Lijst van zaken</a>
    <br>
    <br>

    <a href="./logout.php">Uitloggen.</a>
    <?php } ?>
</body>

</html>