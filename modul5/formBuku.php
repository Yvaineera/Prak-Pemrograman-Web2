<?php
require "Koneksi.php";
require "Model.php";
if (isset($_POST['submit'])) {
	$data = array(
		"id_buku" => "'" . $_POST['id_buku'] . "'",
		"judul_buku" => "'" . $_POST['judul_buku'] . "'",
		"penulis" => "'" . $_POST['penulis'] . "'",
		"penerbit" => "'" . $_POST['penerbit'] . "'",
		"tahun_terbit" => "'" . $_POST['tahun_terbit'] . "'"
	);
	insert($data, 'buku');
	header('location:Buku.php');
}

$id = isset($_GET['id_buku']) ? $_GET['id_buku'] : '';
$data = selectdatabyid("buku", $id, "id_buku");
if (isset($_POST['edit'])) {
	$data = array(
		"id_buku" => "'" . $_POST['id_buku'] . "'",
		"judul_buku" => "'" . $_POST['judul_buku'] . "'",
		"penulis" => "'" . $_POST['penulis'] . "'",
		"penerbit" => "'" . $_POST['penerbit'] . "'",
		"tahun_terbit" => "'" . $_POST['tahun_terbit'] . "'"
	);
	update($data, 'buku', $id, "id_buku");
	header("location:Buku.php");
}

if (isset($_POST['kembali'])) {
	header("location:Buku.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Form Buku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
		*{
            font-family:Georgia, 'Times New Roman', Times, serif; 
        }
        
        body {
            background: rgb(127, 100, 237);
        }

		.container {
			width: 50%;
			margin: auto;
			padding-top: 20px;
			padding-bottom: 20px;
		}

		form {
			padding: 20px;
			background-color: #ffffff;
			border-radius: 5px;
			box-shadow: 0px 5px 10px black;
		}

		h1 {
			color: #ffffff;
			padding: 20px 0;
			margin: 0;
			text-align: center;
			text-shadow: 0px 5px 10px black;
			font-weight: bold;
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
	<?php if (isset($_GET['id_buku'])) : ?>
		<h1 style="text-align: center;" class="mt-2">Edit Buku</h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-5 mx-auto">
					<form method="POST">
						<div class="mb-3 mt-3">
							<label class="form-label">ID</label>
							<input type="text" name="id_buku" value="<?php echo $data['id_buku']; ?>" placeholder="masukkan id_buku" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Judul</label>
							<input type="text" name="judul_buku" value="<?php echo $data['judul_buku']; ?>" placeholder="masukkan judul_buku" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Penulis</label>
							<input type="text" name="penulis" value="<?php echo $data['penulis']; ?>" placeholder="masukkan penulis" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Penerbit</label>
							<input type="text" name="penerbit" value="<?php echo $data['penerbit']; ?>" placeholder="masukkan penerbit" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Tahun Terbit</label>
							<input type="number" name="tahun_terbit" value="<?php echo $data['tahun_terbit'] ?>" placeholder="masukkan tahun_terbit" required class="form-control col-form-label-sm" min="1900" max="2099">
						</div>
						<button type="submit" class="btn btn-primary" name="edit" onclick="return confirm('Simpan perubahan?')">Submit</button>
						<button type="submit" value="ignore" formnovalidate class="btn btn-primary" name="kembali">Kembali</button>
					</form>
				</div>
			</div>
		</div>
	<?php
	endif;
	if (!isset($_GET['id_buku'])) : ?>
		<h1 style="text-align: center;" class="mt-2">Tambah Buku</h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-5 mx-auto">
					<form method="POST">
						<div class="mb-3 mt-3">
							<label class="form-label">ID</label>
							<input type="text" name="id_buku" placeholder="masukkan id_buku" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Buku</label>
							<input type="text" name="judul_buku" placeholder="masukkan judul_buku" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Penulis</label>
							<input type="text" name="penulis" placeholder="masukkan penulis" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Penerbit</label>
							<input type="text" name="penerbit" placeholder="masukkan penerbit" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Tahun Terbit</label>
							<input type="number" name="tahun_terbit" placeholder="masukkan tahun_terbit" required class="form-control col-form-label-sm" min="1900" max="2099">
						</div>
						<button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Tambah data?')">Submit</button>
						<button type="submit" value="ignore" formnovalidate class="btn btn-primary" name="kembali">Kembali</button>
					</form>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>