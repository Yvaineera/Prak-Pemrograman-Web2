<?php
    $c = 37.841;
    $f = (($c*9)/5)+32 ;
    $k = $c + 273.15;
    $r = $c * (4/5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRAK103</title>
</head>
<body>
    <?php
    echo "Fahrenheit (F) = $f <br>";
    echo "Reamur (R) = $r <br>";
    echo "Kelvin (K) = ".(round($k,4));
    ?>
</body>
</html>
