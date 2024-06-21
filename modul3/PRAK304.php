<html>
<head>
    <title>PRAK304</title>
</head>
<body>
<?php
$star = NULL;
$gambar = "<img style='width: 70px;' src='star.png' >";

if (isset($_POST["star"])) {
    $star = $_POST["star"];
}
if (isset($_POST["tambah"])) {
    $star++;
}
if (isset($_POST["kurang"])) {
    $star--;
}
if( empty($star) ) { ?>
    <form action="" method="post">
        <label for="star">Jumlah Bintang :</label>
        <input type="number" name="star"> </br>
        <button type="submit" name="submit">Submit</button>
    </form>
<?php } ?>

<?php if( !empty($star) ) {
echo "Jumlah Bintang : $star "; ?>

<br><br>
<?php for( $i = 0; $i < $star; $i++ ) {
    echo "$gambar";
} ?>

<form action="" method="post">
    <input type="text" name="star" value="<?= $star ?>" hidden>
    <button type="submit" name="tambah" value="tambah">Tambah</button>
    <button type="submit" name="kurang" value="kurang">Kurang</button> 
</form>
<?php } ?>
</body>
</html>