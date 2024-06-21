<html> 
<head> 
    <style> 
        table, tr, td, th { 
        border: solid 1px black; 
        border-collapse: collapse; 
        padding: 5px; 
        } 
        table{ 
        width: 700px; 
        } 
        table tr th{ 
        background-color: lightgray; 
        text-align: left; 
        } 
    </style> 
    <title>PRAK403</title> 
</head> 
 
<body> 
    <?php 
        $nilai = [ 
            ["no" => 1, "nama" => "Ridho", "matkul" => [ 
                ["mk" => "Pemrograman I", "sks" => 2],  
                ["mk" => "Praktikum Pemrograman I", "sks" => 1], 
                ["mk" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],  
                ["mk" => "Arsitektur Komputer", "sks" => 3] ] ], 
            ["no" => 2, "nama" => "Ratna",  "matkul" => [ 
                ["mk" =>"Basis Data I", "sks" => 2],  
                ["mk" => "Praktikum Basis Data I", "sks" => 1], 
                ["mk" => "Kalkulus", "sks" => 3] ] ], 
            ["no" => 3, "nama" => "Tono", "matkul" => [ 
                ["mk" => "Rekayasa Perangkat Lunak", "sks" => 3],  
                ["mk" => "Analisis dan Perancangan Sistem", "sks" => 3], 
                ["mk" => "Komputasi Awan", "sks" => 3],  
                ["mk" => "Kecerdasan Bisnis", "sks" => 3] ] ] 
        ]; 

        for ($i=0; $i < count($nilai); $i++){ 
            $totalSks = 0; 
            for ($j=0; $j < count($nilai[$i]["matkul"]); $j++) { 
                $totalSks += $nilai[$i]["matkul"][$j]["sks"]; }

            $nilai[$i]["totalSks"] = $totalSks; 
            if ($nilai[$i]["totalSks"] < 7) { 
                $nilai[$i]["ket"] = "Revisi KRS"; 
            } else { 
                $nilai[$i]["ket"] = "Tidak Revisi"; 
            } 
        } 
        ?> 
    <table> 
        <tr> 
            <th>No</th> 
            <th>Nama</th> 
            <th>Mata Kuliah diambil</th> 
            <th>SKS</th> 
            <th>Total SKS</th> 
            <th>Keterangan</th> 
        </tr> 
        <?php 
        for ($i=0; $i < count($nilai); $i++) { 
            for ($j=0; $j < count($nilai[$i]["matkul"]); $j++) {  
                echo "<tr>"; 
                if ($j == 0) { 
                    echo "<td>".$nilai[$i]["no"]."</td>"; 
                    echo "<td>".$nilai[$i]["nama"]."</td>"; 
                    echo "<td>".$nilai[$i]["matkul"][$j]["mk"]."</td>"; 
                    echo "<td>".$nilai[$i]["matkul"][$j]["sks"]."</td>"; 
                    echo "<td>".$nilai[$i]["totalSks"]."</td>"; 

                    if ($nilai[$i]["ket"] == "Revisi KRS"){ 
                        echo '<td bgcolor = "red">'.$nilai[$i]["ket"]."</td>"; 
                    } else { 
                        echo '<td bgcolor = "green">'.$nilai[$i]["ket"]."</td>";  
                    } 
                } else { 
                    echo "<td></td>"; 
                    echo "<td></td>"; 
                    echo "<td>".$nilai[$i]["matkul"][$j]["mk"]."</td>"; 
                    echo "<td>".$nilai[$i]["matkul"][$j]["sks"]."</td>"; 
                    echo "<td></td>"; 
                    echo "<td></td>"; 
                } 
                echo "</tr>"; 
            } 
        } 
        ?> 
    </table> 
</body> 
</html> 