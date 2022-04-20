<?php
require './core/connection.php';
session_start();

$importeddata = $pdo->query("SELECT gebruikersnaam, email, wachtwoord FROM gebruikers");

unset($_SESSION['error']);

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM gebruikers WHERE email=:email AND wachtwoord=:password";
    $data = [
    'email' => $email,
    'password' => $password
    ];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    $user = $stmt->fetch();
    if ($user !== false) {
        $_SESSION['loggedInUser'] = $user['id'];
        header('Location: views/home.php');
        die();
    }
    $_SESSION['error'] = "Gebruikersnaam of wachtwoord is ongeldig.";
}
<<<<<<< HEAD
=======
echo "Hello world!"
>>>>>>> b4b5583154b36f500287165e774c590f96e9d49e

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>

    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
            <h3 class="text-2xl font-bold text-center">Inloggen</h3>
            <form method="POST">
                <div class="mt-4">
                    <div>
                        <label class="block" for="email">Email<label>
                                <input type="text" name="email" id="email" placeholder="Email" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="mt-4">
                        <label class="block">Password<label>
                                <input type="password" placeholder="Password" name="password" id="password" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" name="login">Login</button>
                        <a href="./views/register.php" class="text-sm text-blue-600 hover:underline" name="register_redirect">Account aanmaken?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>