<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz Rezerwacji Hotelu</title>
</head>
<body>
<h2>Uzupełnij dane</h2>
<form action="Podsumowanie.php" method="post">
    <label for="full_name">Imię i nazwisko:</label>
    <input type="text" id="full_name" name="full_name" required><br><br>
    <label for="quantity">Liczba osób:</label>
    <select name="quantity" id="quantity">
        <option value="1">1 osoba</option>
        <option value="2">2 osoby</option>
        <option value="3">3 osoby</option>
        <option value="4">4 osoby</option>
    </select><br><br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $quantity = $_POST['quantity'];
        for ($i = 0; $i < $quantity; $i++) {
            echo "<fieldset>";
            echo "<legend>Osoba ".($i+1)."</legend>";
            echo '<label for="name'.$i.'">Imię:</label>';
            echo '<input type="text" id="name'.$i.'" name="name'.$i.'" required><br><br>';
            echo '<label for="surname'.$i.'">Nazwisko:</label>';
            echo '<input type="text" id="surname'.$i.'" name="surname'.$i.'" required><br><br>';
            echo "</fieldset>";
        }
    }
    ?>
    <fieldset>
        <legend>Dodatkowe informacje</legend>
        <label for="address">Adres:</label>
        <input type="text" id="address" name="address" required><br><br>
        <label for="credit_card">Numer karty kredytowej:</label>
        <input type="text" id="credit_card" name="credit_card" required><br><br>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="stay_date">Data przyjazdu:</label>
        <input type="date" id="stay_date" name="stay_date" required><br><br>
        <label for="arrival_time">Godzina przyjazdu:</label>
        <input type="time" id="arrival_time" name="arrival_time" required><br><br>
        <label for="departure_date">Data wyjazdu:</label>
        <input type="date" id="departure_date" name="departure_date" required><br><br>
        <label for="child_bed">Dostawienie łóżka dla dziecka:</label>
        <input type="checkbox" id="child_bed" name="child_bed"><br><br>
        <label for="amenities">Udogodnienia:</label>
        <select id="amenities" name="amenities[]" multiple required>
            <option value="klimatyzacja">Klimatyzacja</option>
            <option value="popielniczka">Popielniczka dla palacza</option>
        </select><br><br>
    </fieldset>
    <input type="submit" value="Zarezerwuj">
</form>
<form action="logout.php" method="post">
    <input type="submit" value="Wyloguj" name="logout">
</form>
</body>
</html>