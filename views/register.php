<?php
require_once '../core/connection.php';
session_start();
$gebruikersnaam = "";
$email = "";
$wachtwoord = "";
$id = null;
$check_error = "";

if (isset($_POST['gebruikersnaam'])) {
    $gebruikersnaam = $_POST['gebruikersnaam'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['wachtwoord'])) {
    $wachtwoord = $_POST['wachtwoord'];
}

$GetQuery = $pdo->prepare("SELECT * FROM gebruikers WHERE email = ?");
$GetQuery->execute([$email]);
$result = $GetQuery->rowCount();
if ($result > 0) {
    $check_error = "<h2> Dit emailadres is al in gebruik, kies een ander emailadres.</h2>";
    echo $check_error;
}


?>
<?php
if (empty($check_error)) {
    if (isset($_POST['create_button'])) {
        echo "<h1 class='font-bold'>Uw account is aangemaakt</h1>";
        header("refresh: 2; url = ../");

        $insertQuery = "INSERT IGNORE INTO gebruikers (id, gebruikersnaam, wachtwoord, email) VALUES (:id, :gebruikersnaam, :wachtwoord, :email)";
        $runInsertQuery = $pdo->prepare($insertQuery);
        $execQuery = $runInsertQuery->execute(array(
        ":id" => $id, ":gebruikersnaam" => $gebruikersnaam, ":wachtwoord" => $wachtwoord, ":email" => $email
        ));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Register pagina</title>
</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
            <h3 class="text-2xl font-bold text-center">Registreer account</h3>
            <form action="" method="POST">
                <div class="mt-4">
                    <div>
                        <label class="block" for="gebruikersnaam">Gebruikersnaam<label>
                                <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div>
                        <label class="block mt-4" for="email">Email<label>
                                <input type="text" placeholder="Email" name="email" class="w-full px-3 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="mt-4">
                        <label for="password" class="block">Password<label>
                                <input type="password" placeholder="wachtwoord" name="wachtwoord" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" name="create_button">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
