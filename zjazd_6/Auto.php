<?php


class NoweAuto
{
    protected $model;
    protected $cenaEuro;
    protected $kursEuroPLN;

    public function __construct($model, $cenaEuro, $kursEuroPLN)
    {
        $this->model = $model;
        $this->cenaEuro = $cenaEuro;
        $this->kursEuroPLN = $kursEuroPLN;
    }

    public function ObliczCene()
    {
        return $this->cenaEuro * $this->kursEuroPLN;
    }


    public function getModel()
    {
        return $this->model;
    }

    public function getCenaEuro()
    {
        return $this->cenaEuro;
    }

    public function getKursEuroPLN()
    {
        return $this->kursEuroPLN;
    }
}

class AutoZDodatkami extends NoweAuto
{
    private $alarm;
    private $radio;
    private $klimatyzacja;

    public function __construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja)
    {
        parent::__construct($model, $cenaEuro, $kursEuroPLN);
        $this->alarm = $alarm;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    public function ObliczCene()
    {
        $cenaPodstawowaPLN = parent::ObliczCene();
        $cenaDodatkow = $this->alarm + $this->radio + $this->klimatyzacja;
        return $cenaPodstawowaPLN + $cenaDodatkow;
    }


    public function getAlarm()
    {
        return $this->alarm;
    }

    public function getRadio()
    {
        return $this->radio;
    }

    public function getKlimatyzacja()
    {
        return $this->klimatyzacja;
    }
}

class Ubezpieczenie extends AutoZDodatkami
{
    private $procentowaWartosc;
    private $liczbaLat;

    public function __construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja, $procentowaWartosc, $liczbaLat)
    {
        parent::__construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja);
        $this->procentowaWartosc = $procentowaWartosc;
        $this->liczbaLat = $liczbaLat;
    }

    public function ObliczCene()
    {
        $cenaSamochoduZDodatkami = parent::ObliczCene();
        $wartoscUbezpieczenia = $this->procentowaWartosc * ($cenaSamochoduZDodatkami * ((100 - $this->liczbaLat) / 100));
        return $cenaSamochoduZDodatkami + $wartoscUbezpieczenia;
    }


    public function getProcentowaWartosc()
    {
        return $this->procentowaWartosc;
    }

    public function getLiczbaLat()
    {
        return $this->liczbaLat;
    }
}

// Przykład użycia
$noweAuto = new NoweAuto("Toyota", 20000, 4.5);
echo "Cena samochodu w PLN: " . $noweAuto->ObliczCene() . " PLN\n";

$autoZDodatkami = new AutoZDodatkami("Toyota", 20000, 4.5, 1000, 500, 1500);
echo "Cena samochodu z dodatkami w PLN: " . $autoZDodatkami->ObliczCene() . " PLN\n";

$ubezpieczenie = new Ubezpieczenie("Toyota", 20000, 4.5, 1000, 500, 1500, 0.05, 3);
echo "Cena samochodu z ubezpieczeniem w PLN: " . $ubezpieczenie->ObliczCene() . " PLN\n";


?>
