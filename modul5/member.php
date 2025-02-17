<?php
require "Koneksi.php";
require "Model.php";
if (!empty($_GET['id_member'])) {
    $id_member = $_GET['id_member'];
    deletedata("member", $id_member, "id_member");
    header('location:member.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Daftar Member</title>
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
    <div class="list-group w-50">
        <h1 class="text-center">Daftar Member</h1>
        <div class="table-responsive">
            <table class="table">
            <tr>
                <td><a href="index.php"><button type="button" class="btn btn-primary">Kembali</button></a></td>
                <td colspan="7"><a href="formMember.php"><button type="button" class="btn btn-primary float-end btn-sm">Tambah Data Baru</button></a></td>
            </tr>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nomor</th>
                <th>Alamat</th>
                <th>Tanggal Mendaftar</th>
                <th>Tanggal terakhir Bayar</th>
                <th colspan="2">Opsi</th>
            </tr>
            <?php
            $result = selectalldata("member");
            while ($data = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td><?php echo $data['id_member'] ?></td>
                    <td><?php echo $data['nama_member'] ?></td>
                    <td><?php echo $data['nomor_member'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['tgl_mendaftar'] ?></td>
                    <td><?php echo $data['tgl_terakhir_bayar'] ?></td>
                    <td style="text-align: center;"><a href="formMember.php?id_member=<?php echo $data['id_member']; ?>"><button class="btn btn-success btn-sm">Edit</button></a></td>
                    <td style="text-align: center;"><a href="member.php?id_member=<?php echo $data['id_member']; ?>" onclick="return confirm('Hapus Data?')"><button class="btn btn-danger btn-sm">Hapus</button></a></td>
                </tr>
                <?php
            }
            ?>
        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>