<html>
<head>
    <title>PRAK305</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="teks" required>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>

<?php
if (isset($_POST["submit"])) {
    $teks = $_POST['teks'];
    $panjang = strlen($teks);
    $input = str_split($teks);
    $j=0;
    $k=0;
    
    while ($k<$panjang) {
        echo strtoupper($input[$j]);
        for( $i= 1; $i<$panjang; $i++ ) {
            echo strtolower($input[$j]);
        }
        $k++;
        $j++;
    }
}
?>