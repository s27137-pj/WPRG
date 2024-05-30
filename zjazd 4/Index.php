<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logowanie</title>
</head>
<body>
<?php
session_start();
$login_username = 'admin';
$login_password = 'password';
$is_logged_in = isset($_SESSION['username']);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    if ($_POST['username'] == $login_username && $_POST['password'] == $login_password) {
        $_SESSION['username'] = $login_username;
        setcookie('username', $login_username, time() + (86400 * 30), "/");
        header('Location: DaneGosci.php');
        exit();
    }
}
?>
<h2>Nie masz dostępu do tej części strony. Zaloguj się, aby uzyskać dostęp.</h2>
<form action="" method="post">
    <input type="text" name="username" placeholder="Nazwa użytkownika" required>
    <input type="password" name="password" placeholder="Hasło" required>
    <input type="submit" value="Zaloguj" name="login">
</form>
</body>
</html>