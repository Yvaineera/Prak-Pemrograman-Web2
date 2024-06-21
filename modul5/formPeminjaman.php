<?php
require "Koneksi.php";
require "Model.php";

if (isset($_POST['submit'])) {
	$data = array(
		"id_peminjaman" => "'" . $_POST['id_peminjaman'] . "'",
		"tgl_pinjam" => "'" . $_POST['tgl_pinjam'] . "'",
		"tgl_kembali" => "'" . $_POST['tgl_kembali'] . "'",
		"id_member" => "'" . $_POST['id_member'] . "'",
		"id_buku" => "'" . $_POST['id_buku'] . "'"
	);
	insert($data, 'Peminjaman');
	header('location:Peminjaman.php');
}

$id = isset($_GET['id_peminjaman']) ? $_GET['id_peminjaman'] : '';
$data = selectdatabyid("peminjaman", $id, "id_peminjaman");
if (isset($_POST['edit'])) {
	$data = array(
		"id_peminjaman" => "'" . $_POST['id_peminjaman'] . "'",
		"tgl_pinjam" => "'" . $_POST['tgl_pinjam'] . "'",
		"tgl_kembali" => "'" . $_POST['tgl_kembali'] . "'",
		"id_member" => "'" . $_POST['id_member'] . "'",
		"id_buku" => "'" . $_POST['id_buku'] . "'"
	);
	update($data, 'peminjaman', $id, "id_peminjaman");
	header("location:Peminjaman.php");
}

if (isset($_POST['kembali'])) {
	header("location:Peminjaman.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Form Peminjaman</title>
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
	<?php if (isset($_GET['id_peminjaman']) || isset($_GET['judul_buku'])) : ?>
		<h1 style="text-align: center;" class="mt-2">Edit Peminjaman</h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-5 mx-auto">
					<form method="POST">
						<div class="mb-3 mt-3">
							<label class="form-label">ID</label>
							<input type="text" name="id_peminjaman" value="<?php echo $data['id_peminjaman']; ?>" placeholder="masukkan id_peminjaman" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Tanggal Peminjaman</label>
							<input type="date" name="tgl_pinjam" value="<?php echo $data['tgl_pinjam']; ?>" placeholder="masukkan tgl_pinjam" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Tanggal Kembali</label>
							<input type="date" name="tgl_kembali" value="<?php echo $data['tgl_kembali']; ?>" placeholder="masukkan tgl_kembali" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Pilih ID Member</label>
							<select class="form-select form-control" id="id_member" name="id_member">
								<?php
								$result = selectalldata("member");
								while ($row = mysqli_fetch_array($result)) {
									echo '<option value=' . $row['id_member'] . '>' . $row['id_member'] . ' - ' . $row['nama_member'] . '</option>';
								}
								?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Pilih ID Buku</label>
							<select class="form-select form-control" id="id_buku" name="id_buku">
								<?php
								$result = selectalldata("buku");
								while ($row = mysqli_fetch_array($result)) {
									echo '<option value=' . $row['id_buku'] . '>' . $row['id_buku'] . ' - ' . $row['judul_buku'] . '</option>';
								}
								?>
							</select>
						</div>
						<button type="submit" class="btn btn-primary" name="edit" onclick="return confirm('Simpan perubahan?')">Submit</button>
						<button type="submit" value="ignore" formnovalidate class="btn btn-primary" name="kembali">Kembali</button>
					</form>
				</div>
			</div>
		</div>
	<?php
	endif;
	if (!isset($_GET['id_peminjaman'])) : ?>
		<h1 style="text-align: center;" class="mt-2">Tambah Peminjaman</h1>
		<div class="container">
			<div class="row">
				<div class="col-sm-5 mx-auto">
					<form method="POST">
						<div class="mb-3 mt-3">
							<label class="form-label">ID</label>
							<input type="text" name="id_peminjaman" placeholder="masukkan id_peminjaman" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Tanggal Peminjaman</label>
							<input type="date" name="tgl_pinjam" placeholder="masukkan tgl_pinjam" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Tanggal Kembali</label>
							<input type="date" name="tgl_kembali" placeholder="masukkan tgl_kembali" required class="form-control col-form-label-sm">
						</div>
						<div class="mb-3">
							<label class="form-label">Pilih ID Member</label>
							<select class="form-select form-control" id="id_member" name="id_member" required>
								<option value="" selected disabled hidden>--pilih member--</option>
								<?php
								$result = selectalldata("member");
								while ($row = mysqli_fetch_array($result)) {
									echo '<option value=' . $row['id_member'] . '>' . $row['id_member'] . ' - ' . $row['nama_member'] . '</option>';
								}
								?>
							</select>
						</div>
						<div class="mb-3">
							<label class="form-label">Pilih ID Buku</label>
							<select class="form-select form-control" id="id_buku" name="id_buku" required>
								<option value="" selected disabled hidden>--pilih buku--</option>
								<?php
								$result = selectalldata("buku");
								while ($row = mysqli_fetch_array($result)) {
									echo '<option value=' . $row['id_buku'] . '>' . $row['id_buku'] . ' - ' . $row['judul_buku'] . '</option>';
								}
								?>
							</select>
						</div>
						<button type="submit" class="btn btn-primary" name="submit" onclick="return confirm('Tambah data?')">Submit</button>
						<button type="submit" value="ignore" formnovalidate class="btn btn-primary" name="kembali">Kembali</button>
					</form>
				</div>
			</div>
		</div>
	<?php endif; ?>
</body>

</html>