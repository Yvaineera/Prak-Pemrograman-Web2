<html>
<head>
    <title>PRAK303</title>
</head>
<body>
    <form action="" method="POST">
        Batas Bawah : <input type="number" name="bawah"></br>
        Batas Atas : <input type="number" name="atas"></br>
        <input type="submit" name="submit" value="Cetak"></br>
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])){
    $bawah = $_POST['bawah'];
    $atas = $_POST['atas'];
    $i = $bawah;
    do{
        if (($i+7)%5==0){
            echo "<img src='star.png' width='15px' height='15px'>";
        } else {
            echo $i;
        }
        echo "&nbsp";
        $i++;
    } while ($i <= $atas);
}
?>