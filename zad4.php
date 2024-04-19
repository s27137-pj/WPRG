<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liczba pierwsza</title>
</head>
<body>
<h2>Sprawdź czy liczba jest liczbą pierwszą</h2>
<form action="" method="post">
    <input type="number" name="number" placeholder="wpisz liczbe" required>
    <button type="submit">Sprawdź</button>
</form>

<?php

    function isPrime($number, &$iterations)
    {
        // Sprawdzenie warunków podstawowych dla liczb mniejszych lub równych 1
        if ($number <= 1) {
            return false;
        }
        $iterations = 0;

        // Sprawdzenie czy liczba dzieli się przez liczby od 2 do pierwiastka z liczby
        for ($i = 2; $i <= sqrt($number); $i++) {
            $iterations++;
            if ($number % $i === 0) {
                return false; // Jeśli znajdziemy dzielnik, liczba nie jest pierwsza
            }
        }

        return true; // Jeśli nie znaleziono dzielnika, liczba jest pierwsza
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    if (!filter_var($number, FILTER_VALIDATE_INT) || $number <= 0) {
        echo "<p>Podana wartość nie jest liczbą całkowitą dodatnią.</p>";
    } else {
        $iterations = 0;
        if (isPrime($number, $iterations)) {
            echo "<p>Liczba $number jest liczbą pierwszą.</p>";
        } else {
            echo "<p>Liczba $number nie jest liczbą pierwszą.</p>";
        }
        echo "<p>Ilość iteracji: $iterations</p>";
    }
}
?>
</body>
</html>

