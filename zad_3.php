<!DOCTYPE html>
<html>
<body>

<?php
function generate_fibonacci_sequence($n) {
    $fibonacci = [0, 1];
    for ($i = 2; $i < $n; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }
    return $fibonacci;
}

$n = 10;
$fibonacci_sequence = generate_fibonacci_sequence($n);

echo "Nieparzyste elementy ciągu Fibonacciego dla $n:\n";
foreach ($fibonacci_sequence as $key => $value) {
    if ($value % 2 != 0) {
        echo "<div>". ($key + 1) . ": " . $value . "</div>";
    }
}

?>

</body>
</html>
