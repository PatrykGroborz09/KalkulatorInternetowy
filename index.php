<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>kalkulator zwykly</h2>
    <form action="" method="post">
        <label for="liczba1">podaj 1 liczbe <input type="float" name="liczba1"></label>
        <label for="liczba2">podaj 2 liczbe <input type="float" name="liczba2"></label>
        <label for="operator">wybierz operator</label>
        <select name="operator">
            <option value="+">dodawanie</option>
            <option value="-">odejmowanie</option>
            <option value="*">mnożenie</option>
            <option value="/">dzielenie</option>
        </select>
        <input type="submit">
    </form>
        <?php
        if(!empty($_POST["liczba1"]) && !empty($_POST["liczba2"])){
            switch ($_POST["operator"]) {
                case '+':
                    $dodawanie = $_POST["liczba1"] + $_POST["liczba2"];
                    echo "<br> wynik: $dodawanie<br>";
                    break;
                case '-':
                    $odejmowanie = $_POST["liczba1"] - $_POST["liczba2"];
                    echo "<br> wynik: $odejmowanie<br>";
                    break;
                case '*':
                    $mnozenie = $_POST["liczba1"] * $_POST["liczba2"];
                    echo "<br> wynik: $mnozenie<br>";
                    break;
                case '/':
                    if($_POST["liczba2"] == 0){
                        echo "<br>Debilu nie dziel przez zero<br>";
                    }
                    else{
                        $dzielenie = $_POST["liczba1"] / $_POST["liczba2"];
                        echo "<br> wynik: $dzielenie<br>";
                    }
                    break;
                default:
                    break;
            }
        }
        ?>
    <form action="" method="post">
        <h2>kalkulator oszczednosci/lokat</h2>
        <label for="kwota">kwota <input type="float" name="kwota"></label>
        <label for="oprocentowanie">oprocentowanie <input type="float" name="oprocentowanie"></label>
        <label for="lata">lata <input type="float" name="lata"></label>
        <input type="submit">
        </form>

        <?php
        if(!empty($_POST["kwota"]) && !empty($_POST["oprocentowanie"]) && !empty($_POST["lata"])){
            $_POST["oprocentowanie"] /= 100;
            $oprocentowanie = ($_POST["kwota"] * $_POST["oprocentowanie"])*$_POST["lata"];
            echo "Będziesz bogatszy o ".$oprocentowanie."zł<br>";
        }
        ?>

        <form action="" method="post">
            <h2>Sprawdzanie płci</h2>
            <label for="PESEL">PESEL<input type="float" name="PESEL"></label>
            <input type="submit">
        </form>
        <?php
        if(!empty($_POST["PESEL"])){
            $controlNum = intval(substr($_POST["PESEL"], -2));
            if($controlNum % 2 == 0){
                echo "To jest dziewczynka";
            }
            else{
                echo "to jest chłopiec"; 
            }
        }
        ?>

        <h2>kownerter temperatury</h2>
        <form method="post">
            <label for="temperatura">Temperatura<input type="float" name="temperatura"></label>
            <select name="jednostka">
                <option value="C">&deg;C</option>
                <option value="F">&deg;F</option>
                <option value="K">K</option>
            </select>
            <input type="submit" value="ŁOK">
        </form>
        <?php
        if (!empty($_POST["temperatura"]) && !empty($_POST["jednostka"])) {
            $jed = $_POST["jednostka"];
            $temp = $_POST["temperatura"];
            if ($jed == "C") {
                echo round($temp *9/5 + 32, 2) . "&deg;F <br>";
                echo round($temp + 273.15, 2)."K";
            }
            if ($jed == "F") {
                echo round(($temp - 32)*5/9, 2) . "&degC <br>";
                echo round(($temp - 32)/1.8 + 273.15, 2) . "K";
            }
            if ($jed == "K") {
                echo round($temp - 273.15, 2) . "&degC <br>";
                echo round(($temp - 273.15)*1.8 + 32, 2) . "&degF";
            }
        }
        ?>

<form method="post">
            <label for="dlugosc">Dlugosc<input type="float" name="dlugosc"></label>
            <select name="jednostka">
                <option value="stopa">stopa</option>
                <option value="jard">jard</option>
                <option value="mila ladawa">mila ladawa</option>
                <option value="mila morska">mila morska</option>
                <option value="cal">cal</option>
            </select>
            <input type="submit" value="ŁOK">
        </form>
        <?php
        if (!empty($_POST["dlugosc"]) && !empty($_POST["jednostka"])) {
            $jed = $_POST["jednostka"];
            $dlu = $_POST["dlugosc"];
            if ($jed == "stopa") {
                echo round($dlu/3, 2) . "jard<br>";
                echo round($dlu*0.0001894, 2) . "mil lądowych<br>";
                echo round($dlu/6076.12, 2) . "mil morskich<br>";
                echo round($dlu*12, 2) . "cali<br>";
            }
            if ($jed == "jard") {
                echo round($dlu*3, 2) . "stopy<br>";
                echo round($dlu/1760, 2) . "mil lądowych<br>";
                echo round($dlu/2025.37, 2) . "mil morskich<br>";
                echo round($dlu*36, 2) . "cali<br>";
            }
            if ($jed == "mila ladawa") {
                echo round($dlu*5280, 2) . "stopy<br>";
                echo round($dlu*1760, 2) . "jard<br>";
                // echo ($dlu*1.60934)/1.852 . "mil morskich<br>";
                echo round($dlu/1.15078, 2) . "mil morskich<br>";
                echo round($dlu*63360, 2) . "cali<br>";
            }
            if ($jed == "mila morska") {
                echo round($dlu/6076.12, 2) . "stopy<br>";
                echo round($dlu/2025.37, 2) . "jard<br>";
                // echo ($dlu*1.60934)/1.852 . "mil morskich<br>";
                echo round($dlu/1.15078, 2) . "mil lądowa<br>";
                echo round($dlu/72913.39, 2) . "cali<br>";
            }
        }
        ?>
        <form method="post">
            Podaj Cene paliwa
            <input type="float" step="0.01" name="cp">
            Podaj długość trasy(km)
            <input type="float" step="0.01" name="dt">
            podaj spalanie auta
            <input type="float" step="0.01" name="sa">
            <input type="submit" value="Łok">
        </form>
        <?php
        if (!empty($_POST["cp"]) && !empty($_POST["dt"]) && !empty($_POST["sa"])){
        $cp = floatval($_POST["cp"]);
        $dt = floatval($_POST["dt"]);
        $sa = floatval($_POST["sa"]);
        $w = $dt/100;
        $s = $sa*$w;
        $d = $s*$cp;
        echo $d ."zł";
        }
        ?>
         <form method="post">
            <h2>kalkulator ceny prądu</h2>
            Podaj cene 1kwh (zł)
            <input type="float" step="0.01" name="cena">
            Podaj czas dzialania (w godzinach)
            <input type="float" step="0.01" name="czas">
            <select name="urzadzenia">
                <option value="500">komputer</option>
                <option value="2500">piekarnik</option>
                <option value="2000">czajnik</option>
                <option value="400">lodówka</option>
                <option value="1800">pralka</option>
                <option value="600">odkurzacz</option>
                <option value="1200">suszarka</option>
                <option value="100">telewizor</option>
                <option value="1350">zmywarka</option>
                <option value="820">mikrofalówka</option>
                
            </select>
            <input type="submit" value="Łok">
        </form>
        <?php
        

        if (!empty($_POST["cena"]) && !empty($_POST["czas"]) && !empty($_POST["urzadzenia"])){
            $cena = $_POST["cena"];
            $czas = $_POST["czas"];
            $urzadzenia = $_POST["urzadzenia"];

            echo $cena * $czas * $urzadzenia/1000;
        }
        ?>
        <h2>Obliczanie wartości netto/brutto</h2>
        <form method="post">
            Podaj kwote brutto: <input type="number" name="brutto">
            Podaj wartość procentową podatku: <input type="number" name="podatek">
            <input type="submit" value="ŁOK">
        </form>
        <?php
        if (!empty($_POST["brutto"]) && !empty($_POST["podatek"])) {
            $procent =  $_POST["brutto"] * ($_POST["podatek"]/100);
            echo $_POST["brutto"] - $procent;
        }
        ?>

        <h2>cukierki dzieci</h2>
        <form method="post">
            Ilośc cukierkow: <input type="number" name="cukierki">
            ilosc ludziow: <input type="number" name="ludzie">
            <input type="submit" value="ŁOK">
        </form>
        <?php
        if (!empty($_POST["cukierki"]) && !empty($_POST["ludzie"])) {
        $c = $_POST["cukierki"];
        $l = $_POST["ludzie"];
        echo "zostalo ".$c % $l."  cukierkow<br>";
        echo  "kazda osoba dostała ". floor($c / $l). " cukierki";
        }
        ?>
        <h2>kalkulator objętości</h2>
        <form method="post">
            podaj a (w metrach): <input type="float" name="a">
            podaj b (w metrach): <input type="float" name="b">
            podaj h (w metrach): <input type="float" name="h">
            <input type="submit" value="ŁOK">
        </form>

            <?php
            if (!empty($_POST["a"]) && !empty($_POST["b"]) && !empty($_POST["h"])) {
            $a = $_POST["a"];
            $b = $_POST["b"];
            $h = $_POST["h"];

            $obj = $a * $b * $h;
            echo $obj. " litrów";
            }
            ?>
        
</body>
</html>