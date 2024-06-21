<?php 
require "Koneksi.php"; 
require "Model.php"; 
if (!empty($_GET['id_buku'])) { 
    $id_buku = $_GET['id_buku']; 
    deletedata("buku", $id_buku, "id_buku"); 
    header('location:buku.php'); 
} 
?> 
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Daftar Buku</title>
    <style>
        *{
            font-family:Georgia, 'Times New Roman', Times, serif; 
        }
        
        body {
            background: whitesmoke;
        }

        .list-group {
            margin: 50px auto;
            box-shadow: 0px 5px 10px black;
            border-radius: 10px;
            overflow: hidden;
        }

        h1 {
            background-color: rgb(127, 100, 237);
            color: white;
            font-weight: bold;
            padding: 20px 0;
            margin: 0;
        }

        .table-responsive {
            padding: 20px;
        }

        table.table {
            margin-bottom: 0;
        }

        .btn-primary {
            background-color: rgb(127, 100, 237);
            padding: 8px;
        }

        .btn-primary:hover {
            background-color: rgb(38, 37, 47);
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="list-group w-75">
        <h1 class="text-center">Daftar Buku</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th colspan="2">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = selectalldata("buku");
                    while ($data = mysqli_fetch_array($result)) {
                        ?>
                        <tr>
                            <td><?php echo $data['id_buku']?></td>
                            <td><?php echo $data['judul_buku']?></td>
                            <td><?php echo $data['penulis']?></td>
                            <td><?php echo $data['penerbit']?></td>
                            <td><?php echo $data['tahun_terbit']?></td>
                            <td style="text-align: center;"><a href="formBuku.php?id_buku=<?php echo $data['id_buku']; ?>"><button class="btn btn-success btn-sm">Edit</button></a></td>
                            <td style="text-align: center;"><a href="buku.php?id_buku=<?php echo $data['id_buku']; ?>" onclick="return confirm('Hapus Data?')"><button class="btn btn-danger btn-sm">Hapus</button></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="mt-3">
                <a href="formBuku.php"><button type="button" class="btn btn-primary float-end">Tambah Data Baru</button></a>
                <a href="index.php"><button type="button" class="btn btn-primary">Kembali</button></a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>