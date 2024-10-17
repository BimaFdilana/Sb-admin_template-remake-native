<?php
// Menghubungkan file koneksi
include('../conf/db_conn.php');

// Query untuk mengambil data dari tb_undangan dan tb_image
$sql = "SELECT tb_undangan.id_undangan, tb_undangan.nama_undangan, tb_undangan.jumlah_undangan, 
               tb_undangan.harga_undangan, tb_undangan.jenis_undangan, tb_undangan.deskripsi_undangan, 
               tb_undangan.detail_undangan, tb_image.nama_image, tb_image.image 
        FROM tb_undangan 
        INNER JOIN tb_image ON tb_undangan.id_image = tb_image.id_image";

$result = mysqli_query($conn, $sql);

// Cek apakah ada data
if (mysqli_num_rows($result) > 0) {
    // Menyimpan data ke dalam array
    $undangan = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $undangan = []; // Jika tidak ada data, inisialisasi array kosong
}

mysqli_close($conn); // Menutup koneksi
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>
<body>

<h1>Data Undangan</h1>

<?php if (!empty($undangan)): ?>
    <?php foreach ($undangan as $data): ?>
        <div class="undangan">
            <h2><?php echo htmlspecialchars($data['nama_undangan']); ?></h2>
            <p>Jumlah: <?php echo htmlspecialchars($data['jumlah_undangan']); ?></p>
            <p>Harga: Rp<?php echo number_format($data['harga_undangan'], 0, ',', '.'); ?></p>
            <p>Jenis: <?php echo htmlspecialchars($data['jenis_undangan']); ?></p>
            <p>Deskripsi: <?php echo htmlspecialchars($data['deskripsi_undangan']); ?></p>
            <p>Detail: <?php echo htmlspecialchars($data['detail_undangan']); ?></p>
            <img src="path_to_image_folder/<?php echo htmlspecialchars($data['image']); ?>" alt="<?php echo htmlspecialchars($data['nama_image']); ?>" width="200px">
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Data undangan tidak ditemukan.</p>
<?php endif; ?>

</body>
</html>
