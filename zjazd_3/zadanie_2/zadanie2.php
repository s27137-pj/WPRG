<?php
function factorialRecursive($n) {
    if ($n === 0 || $n === 1) {
        return 1;
    } else {
        return $n * factorialRecursive($n - 1);
    }
}

function factorialNonRecursive($n) {
    $result = 1;
    for ($i = 1; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}

function fibonacciRecursive($n) {
    if ($n === 0) {
        return 0;
    } elseif ($n === 1) {
        return 1;
    } else {
        return fibonacciRecursive($n - 1) + fibonacciRecursive($n - 2);
    }
}

function fibonacciNonRecursive($n) {
    $a = 0;
    $b = 1;
    for ($i = 2; $i <= $n; $i++) {
        $temp = $a + $b;
        $a = $b;
        $b = $temp;
    }
    return $b;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["number"])) {
    $number = intval($_POST["number"]);

    // Obliczenia rekurencyjne
    $resultRecursive = factorialRecursive($number);

    // Obliczenia nierekurencyjne
    $resultNonRecursive = factorialNonRecursive($number);


    echo "<h3>Wyniki:</h3>";
    echo "Rekurencyjnie obliczona wartość: $resultRecursive<br>";
    echo "Nierekurencyjnie obliczona wartość: $resultNonRecursive<br>";

    // Porównanie wyników
    if ($resultRecursive === $resultNonRecursive) {
        echo "Obie funkcje zwracają ten sam wynik.";
    } else {
        echo "Wyniki różnią się.";
    }
}

?>