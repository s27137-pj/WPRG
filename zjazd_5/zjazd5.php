<?php
// Połączenie z bazą danych
$host = 'localhost';
$user = 'root';
$pass = '';
$dbName = 'testdb';
$port = 3307;

// Połączenie z bazą danych
$db = new mysqli($host, $user, $pass, $dbName, $port);

// Sprawdzenie połączenia z bazą danych
if ($db->connect_error) {
    die("Połączenie z bazą danych nieudane: " . $db->connect_error);
}

echo "Udało się połączyć z bazą danych<br>";

// Funkcja do wstawiania filmu do bazy danych
function insertFilm($db, $title, $category) {
    $insertQuery = "INSERT INTO film (tytuł, kategoria) VALUES (?, ?)";
    $stmt = $db->prepare($insertQuery);
    $stmt->bind_param('ss', $title, $category);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

// Obsługa formularza dodawania filmu
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title']) && isset($_POST['category'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    if (insertFilm($db, $title, $category)) {
        echo "Dodano<br>";
    } else {
        echo "Błąd podczas dodawania filmu<br>";
    }
}

// Wyświetlanie formularza dodawania filmu
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dodaj film</title>
</head>
<body>

<h2>Dodaj nowy film</h2>
<form method="post" action="">
    <label for="title">Tytuł:</label><br>
    <input type="text" id="title" name="title" required><br><br>
    <label for="category">Kategoria:</label><br>
    <input type="text" id="category" name="category" required><br><br>
    <input type="submit" value="Dodaj">
</form>

<h2>Wybierz film do wyświetlenia</h2>
<?php
// Polecenie SELECT i przećwiczenie mysqli_fetch_row
$selectQuery = "SELECT id, tytuł FROM film";
$result = $db->query($selectQuery);

if ($result && $result->num_rows > 0) {
    echo '<form method="post" action="">';
    echo '<select name="film_id">';
    while ($row = $result->fetch_row()) {
        echo '<option value="' . $row[0] . '">' . $row[1] . '</option>';
    }
    echo '</select>';
    echo '<input type="submit" value="Wyświetl">';
    echo '</form>';
} else {
    echo "Brak filmów do wyświetlenia<br>";
}
?>

<?php
// Wyświetlanie szczegółów wybranego filmu
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['film_id'])) {
    $filmId = $_POST['film_id'];
    $selectQuery = "SELECT id, tytuł, kategoria FROM film WHERE id = ?";
    $stmt = $db->prepare($selectQuery);
    $stmt->bind_param('i', $filmId);
    $stmt->execute();
    $stmt->bind_result($id, $title, $category);

    if ($stmt->fetch()) {
        echo "<h3>Szczegóły filmu:</h3>";
        echo "<table border='1'><tr><th>ID</th><th>Tytuł</th><th>Kategoria</th></tr>";
        echo "<tr><td>$id</td><td>$title</td><td>$category</td></tr>";
        echo "</table>";
    } else {
        echo "Nie znaleziono szczegółów na temat wybranego filmu.<br>";
    }

    $stmt->close();
}


// Wyświetlanie wszystkich filmów
echo "<h2>Wyświetla wszystkie filmy za pomocą polecenia SELECT i mysqli_fetch_array:</h2>";
$selectAllQuery = "SELECT id, tytuł, kategoria FROM film";
$resultAll = $db->query($selectAllQuery);

if ($resultAll && $resultAll->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Tytuł</th><th>Kategoria</th></tr>";
    while ($row = $resultAll->fetch_array()) {
        echo "<tr><td>{$row['id']}</td><td>{$row['tytuł']}</td><td>{$row['kategoria']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "Brak filmów do wyświetlenia<br>";
}

// Liczba wierszy za pomocą polecenia SELECT i mysqli_num_rows
$numRowsQuery = "SELECT COUNT(*) as total FROM film";
$numRowsResult = $db->query($numRowsQuery);
if ($numRowsResult) {
    $row = $numRowsResult->fetch_assoc();
    $numRows = $row['total'];
    echo "<p>Liczba wierszy za pomocą polecenia SELECT i mysqli_num_rows: $numRows</p>";
} else {
    echo "Błąd podczas pobierania liczby wierszy<br>";
}

// Zamykanie połączenia z bazą danych
$db->close();
?>

</body>
</html>
