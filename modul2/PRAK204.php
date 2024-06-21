<html>
<head>
    <title>PRAK204</title>
</head>
<body>
    <form action="" method ="post">
        Nilai : <input type="number" name="nilai"></br>
        <input type="submit" name="submit" value="Konversi">
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])){
    $nilai = $_POST['nilai'];

    if ($nilai == 0){
        echo "<h2>Hasil : Nol</h2>";
    } elseif ($nilai > 0 && $nilai < 10){
        echo "<h2>Hasil : Satuan</h2>";
    } elseif ($nilai >= 11 && $nilai < 20){
        echo "<h2>Hasil : Belasan</h2>";
    } elseif ($nilai >= 10 && $nilai < 100){
        echo "<h2>Hasil : Puluhan</h2>";
    } elseif ($nilai >= 100 && $nilai < 1000){
        echo "<h2>Hasil : Ratusan</h2>";
    } elseif ($nilai >= 1000){
        echo "<h2>Hasil : Anda Menginput Melebihi Limit Bilangan</h2>";
    }
}