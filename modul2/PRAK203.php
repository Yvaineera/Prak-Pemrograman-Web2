<html>
<head>
    <title>PRAK203</title>
</head>
<body>
    <form method="post">
        Nilai <input type="number" name="suhu"></br>
        Dari : </br>
        <input type="radio" name="dari" value="C">Celcius</br>
        <input type="radio" name="dari" value="F">Fahrenheit</br>
        <input type="radio" name="dari" value="R">Reamur</br>
        <input type="radio" name="dari" value="K">Kelvin</br>
        Ke : </br>
        <input type="radio" name="ke" value="C">Celcius</br>
        <input type="radio" name="ke" value="F">Fahrenheit</br>
        <input type="radio" name="ke" value="R">Reamur</br>
        <input type="radio" name="ke" value="K">Kelvin</br>
        <input type="submit" name="submit" value="Konversi">
</form>
</body>
</html>

<?php
if (isset($_POST['submit'])){
    $suhu = $_POST['suhu'];
    $dari = $_POST['dari'];
    $ke = $_POST['ke'];

    if($dari == "C"){
        if ($ke == "C"){
            echo "<h2> Hasil Konversi : ". $suhu ." &degC</h2>";
        } elseif($ke == "F"){
            echo "<h2> Hasil Konversi : ". ($suhu * 1.8 + 32) ." &degF</h2>";
        } elseif($ke == "R"){
            echo "<h2> Hasil Konversi : ". ($suhu * 0.8) ." &degR</h2>";
        } elseif($ke == "K"){
            echo "<h2> Hasil Konversi : ".($suhu + 273.15) ." &degK</h2>";
        }
    } elseif($dari == "F"){
        if ($ke == "C"){
            echo "<h2> Hasil Konversi : ". ($suhu - 32) / 1.8 ." &degC</h2>";
        } elseif($ke == "F"){
            echo "<h2> Hasil Konversi : ". $suhu ." &degF</h2>";
        } elseif($ke == "R"){
            echo "<h2> Hasil Konversi : ". ($suhu - 32) / 2.25 ." &degR</h2>";
        } elseif($ke == "K"){
            echo "<h2> Hasil Konversi : ". ($suhu + 459.67) / 1.8 ." &degK</h2>";
        }
    } elseif($dari == "R"){
        if ($ke == "C"){
            echo "<h2> Hasil Konversi : ". ($suhu * 1.25) ."&degC</h2>";
        } elseif($ke == "F"){
            echo "<h2> Hasil Konversi : ". ($suhu * 2.25 + 32) ." &degF</h2>";
        } elseif($ke == "R"){
            echo "<h2> Hasil Konversi : ". $suhu ." &degR</h2>";
        } elseif($ke == "K"){
            echo "<h2> Hasil Konversi : ". ($suhu + 273.15) / 0.8 ." &degK</h2>";
        }
    } elseif($dari == "K"){
        if ($ke == "C"){
            echo "<h2> Hasil Konversi : ". ($suhu - 273.15) ." &degC</h2>";
        } elseif($ke == "F"){
            echo "<h2> Hasil Konversi : ". ($suhu * 1.8 + 459.67) ." &degF</h2>";
        } elseif($ke == "R"){
            echo "<h2> Hasil Konversi : ". ($suhu - 273.15) * 0.8 ." &degR</h2>";
        } elseif($ke == "K"){
            echo "<h2> Hasil Konversi : ". $suhu / 0.8 ." &degK</h2>";
        }
    }
}