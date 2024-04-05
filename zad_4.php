<!DOCTYPE html>
<html>
<body>

<?php

$data = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
 Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
 when an unknown printer took a galley of type and scrambled it to make a type specimen book.
 It has survived not only five centuries, but also the leap into electronic typesetting,
 remaining essentially unchanged.
 It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
 and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
$array = explode(" ", $data);
print_r($array);

$count = count($array);
for ($i = 0; $i < $count; $i++) {
    if (strpos($array[$i], '.') !== false || strpos($array[$i], ',') !== false) {
        unset($array[$i]);
    }
}

print_r($array);

$array = array_values($array);

print_r($array);

$associative_array = [];
$count = count($array);
for ($i = 0; $i < $count - 1; $i += 2) {
    $associative_array[$array[$i]] = $array[$i + 1];
}

foreach ($associative_array as $key => $value) {
    echo $key . " => " . $value . "\n";
}



?>

</body>
</html>
