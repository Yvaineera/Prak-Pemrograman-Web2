<html>
<head>
    <title>PRAK301</title>
</head>
<body>
    <form action="" method="POST">
        Jumlah Peserta: <input type="number" name="nilai"></br>
        <input type="submit" name="submit" value="Cetak">
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])){
    $nilai = $_POST['nilai'];
    $i = 1;
    while ($i <= $nilai){
        if ($i%2 == 0){
            echo "<h2><font color='blue'>Peserta ke-$i</font></br>";
        } else {
            echo "<h2><font color='purple'>Peserta ke-$i</font></br>";
        }
        $i++;
    }
}
?>