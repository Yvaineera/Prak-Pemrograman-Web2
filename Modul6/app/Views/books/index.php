<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= base_url('dashboard') ?>" class="btn btn-secondary">Kembali</a>
        <h2>Daftar Buku</h2>
        <a href="<?= base_url('books/create') ?>" class="btn btn-primary">Tambah Buku Baru</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= $book['id'] ?></td>
                    <td><?= $book['judul'] ?></td>
                    <td><?= $book['penulis'] ?></td>
                    <td><?= $book['penerbit'] ?></td>
                    <td><?= $book['tahun_terbit'] ?></td>
                    <td>
                        <a href="<?= base_url('books/edit/'.$book['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('books/delete/'.$book['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>