<html>
<head>
    <title>PRAK302</title>
</head>
<body>
    <form action="" method="POST">
        Tinggi : <input type="number" name="tinggi"></br>
        Alamat Gambar : <input type="text" name="alamat"></br>
        <input type="submit" name="submit" value="Cetak">
    </form>
</body>
</html>

<?php
if (isset($_POST['submit'])){
    $tinggi = $_POST['tinggi'];
    $alamat = $_POST['alamat'];
    $i=0;
    while($i < $tinggi){
        $j=0;
        while($j < $i){
            echo "&nbsp &nbsp &nbsp";
            $j++;
        }
        $j=0;
        while($j < $tinggi-$i){
            echo "<img src='$alamat' width='20px' height='20px'>";
            $j++;
        }

        echo "<br>";
        $i++;
    }
}
?>