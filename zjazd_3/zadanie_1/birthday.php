<?php
// przesłanie datę urodzenia przez formularz GET
if (isset($_GET['birthdate'])) {
    // obiekt DateTime z danych przesłanych z formularza
    $birthdate = new DateTime($_GET['birthdate']);

    echo 'Urodziłeś się w : ' . getDayOfWeekName($birthdate) . "<br>";

    echo 'Ukończone lata: ' . calculateAge($birthdate) . "<br>";

    echo 'Ilość dni do najbliższych urodzin: ' . calculateDaysUntilNextBirthday($birthdate) . "<br>";
}

function getDayOfWeekName($birthdate) {
    $daysOfWeek = ['Niedziele', 'Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek', 'Sobotę'];
    return $daysOfWeek[$birthdate->format('w')];
}

function calculateAge($birthdate) {
    $today = new DateTime();
    $interval = $today->diff($birthdate);
    return $interval->y; // Zwróć liczbę lat (różnicę w latach między datą dzisiejszą a datą urodzenia)
}

function calculateDaysUntilNextBirthday($birthdate) {
    $today = new DateTime();

    // obiekt DateTime dla daty urodzin w bieżącym roku
    $currentYearBirthday = new DateTime($today->format('Y') . '-' . $birthdate->format('m-d'));

    // data urodzin dla następnego roku
    $nextYearBirthday = new DateTime(($today->format('Y') + 1) . '-' . $birthdate->format('m-d'));

    // czy już minęła data urodzin w bieżącym roku
    if ($today > $currentYearBirthday) {
        // oblicz dni do urodzin w następnym roku
        $daysUntilBirthday = $nextYearBirthday->diff($today)->days;
    } else {
        // Jeśli jeszcze nie minęła data urodzin w bieżącym roku
        $daysUntilBirthday = $currentYearBirthday->diff($today)->days;
    }

    return $daysUntilBirthday;
}
?>