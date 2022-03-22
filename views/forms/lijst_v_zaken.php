<?php
session_start();
if (empty($_SESSION['loggedInUser'])) {
    echo "<h2> Je bent niet ingelogd, Toegang geweigerd. Doorverwijzen...";
    header("refresh: 2; url= ../");
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lijst van zaken formulier 1</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            div.form_div {
                display: flex;
            }
        </style>
    </head>

    <body>
        <!-- Als niet ingelogd dan word je terug gestuurd naar login pagina. -->
    <?php } 
    
    ?>
    <h1>Lijst van zaken DEMO</h1>
    <div class="form_div">
        <form action="downloadpdf.php" method="POST">

            <label for="inzake-adress">Inzake het adres</label>
            <input type="text" name="inzake-adres">
            <br>
            <br>
            <label for="te-postcode">Te (postcode en plaats)</label>
            <input type="text" name="te-postcode">
            <br>
            <br>
            <label for="deb-nmr">Deb nr</label>
            <input type="text" name="deb-nmr">
            <br>
            <br>
            <br>
            <br>
            <h5>Tuin</h5>
            <input type="radio" id="gaat_mee" name="tuin" value="Gaat mee">
            <label for="gaat_mee">Gaat mee</label><br>

            <input type="radio" id="n_v_t" name="tuin" value="N.v.t.">
            <label for="n_v_t">N.v.t.</label><br>

            <input type="radio" id="blijft_achter" name="tuin" value="Blijft achter">
            <label for="blijft_achter">Blijft achter</label><br>

            <input type="radio" id="over_te_nemen" name="tuin" value="Over te nemen">
            <label for="over_te_nemen">Over te nemen</label><br>

            <br>
            <a href="downloadpdf.php?file=lijst_v_zaken">Download PDF Now</a>
        </form>
    </div>
    </body>

    </html>