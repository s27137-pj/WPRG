<!DOCTYPE html>
<html>
<body>

<?php

// czy jest pierwsza
function firstNumber($number) {
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i * $i <= $number; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}


$start = 1;
$stop = 100;

echo "Liczby pierwsze w zakresie od $start do $stop: <br>";

for ($number = $start; $number <= $stop; $number++) {
    if (firstNumber($number)) {
        echo $number . "<br>";
    }
}

?>

</body>
</html>
