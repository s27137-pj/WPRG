<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zadanie_1</title>
</head>
<body>
<form action="" method="post">
    <input type="number" name="x" placeholder="Podaj pierwsza wartosc" max="99">
    <input type="number" name="y" placeholder="Podaj druga wartosc" max="99">
    <select name="wybor">
        <option value="dodaj">Dodawanie</option>
        <option value="odejmij">Odejmowanie</option>
        <option value="pomnoz">Mnożenie</option>
        <option value="podziel">Dzielenie</option>
    </select>
    <button type="submit">Oblicz</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $x = $_POST['x'];
    $y = $_POST['y'];
    $wybor = $_POST['wybor'];

    if (!empty($x) && !empty($y)) {
        switch ($wybor) {
            case "dodaj":
                $result = $x + $y;
                echo "Wynik: $result";
                break;
            case "odejmij":
                $result = $x - $y;
                echo "Wynik: $result";
                break;
            case "pomnoz":
                $result = $x * $y;
                echo "Wynik: $result";
                break;
            case "podziel":
                if ($y != 0) {
                    $result = $x / $y;
                    echo "Wynik: $result";
                } else {
                    echo "Nie można dzielić przez zero!";
                }
                break;
            default:
                echo "Niepoprawny operator";
        }
    } else {
        echo "Wpisz obie liczby!";
    }
}
?>
</body>
</html>