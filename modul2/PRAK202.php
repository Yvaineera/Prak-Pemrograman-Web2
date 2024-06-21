<?php
$namaErr = $nimErr = $genderErr = "";
$nama = $nim = $gender = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['nama'])){
        $namaErr = "Nama tidak boleh kosong";
    } else {
        $nama = test_input($_POST['nama']);
    }
    if (empty($_POST['nim'])){
        $nimErr = "NIM tidak boleh kosong";
    } else {
        $nim = test_input($_POST['nim']);
    }
    if (empty($_POST['gender'])){
        $genderErr = "Jenis kelamin tidak boleh kosong";
    } else {
        $gender = test_input($_POST['gender']);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<html>
<head>
    <title>PRAK202</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <form method="post">
        Nama : <input type="text" name="nama" value="<?php echo $nama; ?>">
        <span class="error"><?php echo $namaErr;?></span></br>
        NIM  : <input type="text" name="nim" value="<?php echo $nim; ?>">
        <span class="error"><?php echo $nimErr;?></span></br>
        Jenis Kelamin : <span class="error"><?php echo $genderErr;?></span></br>
        <input type="radio" name="gender" value="Laki-laki">Laki-laki</br>
        <input type="radio" name="gender" value="Perempuan">Perempuan</br>
        <input type="submit" name="submit" value="submit">
    </form></br>
    <?php
    if(!empty($nama) && !empty($nim) && !empty($gender)){
        echo "$nama <br>";
        echo "$nim <br>";
        echo "$gender <br>";
    }
    ?>
</body>
</html>