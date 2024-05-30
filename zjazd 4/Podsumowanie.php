<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podsumowanie Rezerwacji</title>
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["full_name"]) ? $_POST["full_name"] : '';
    $address = isset($_POST["address"]) ? $_POST["address"] : '';
    $credit_card = isset($_POST["credit_card"]) ? $_POST["credit_card"] : '';
    $stay_date = isset($_POST["stay_date"]) ? $_POST["stay_date"] : '';
    $departure_date = isset($_POST["departure_date"]) ? $_POST["departure_date"] : '';
    setcookie('name', $name, time() + (86400 * 30));
    setcookie('address', $address, time() + (86400 * 30));
    setcookie('credit_card', $credit_card, time() + (86400 * 30));
    setcookie('stay_date', $stay_date, time() + (86400 * 30));
    setcookie('departure_date', $departure_date, time() + (86400 * 30));

    echo "<p><strong>Imię i nazwisko:</strong> $name</p>";
    echo "<p><strong>Adres:</strong> $address</p>";
    echo "<p><strong>Numer karty kredytowej:</strong> $credit_card</p>";
    echo "<p><strong>Data przyjazdu:</strong> $stay_date</p>";
    echo "<p><strong>Data wyjazdu:</strong> $departure_date</p>";
} else {
    echo "<p>Nieprawidłowe zapytanie HTTP.</p>";
}
?>

<form action="Index.php" method="post">
    <input type="submit" value="Wyloguj" name="logout">
</form>
