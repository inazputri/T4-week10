<?php
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM barang ORDER BY id ASC");
$data = $stmt->fetchAll();

$pesan = $_GET['pesan'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Inventaris</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <h2>Data Inventaris</h2>

    <?php if ($pesan == 'tambah_sukses'): ?>
    <div class="alert alert-success alert-dismissible fade show">
        Data berhasil ditambahkan!
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

<?php elseif ($pesan == 'update_sukses'): ?>
    <div class="alert alert-info alert-dismissible fade show">
        Data berhasil diupdate!
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

<?php elseif ($pesan == 'hapus_sukses'): ?>
    <div class="alert alert-warning alert-dismissible fade show">
        Data berhasil dihapus!
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nama_barang'] ?></td>
                <td><?= $row['kategori'] ?></td>
                <td><?= $row['jumlah'] ?></td>
                <td><?= number_format($row['harga'], 0, ',', '.') ?></td>
                <td><?= $row['lokasi'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin hapus?')">
                       Hapus
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <div class="text-end mt-3">
        <a href="create.php" class="btn btn-primary">+ Tambah Barang</a>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>