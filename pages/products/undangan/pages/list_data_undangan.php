<?php
require("conf/db_conn.php");

// Query untuk mengambil data undangan dan gambar terkait menggunakan JOIN
$query = " SELECT tb_undangan.id_undangan, tb_undangan.nama_undangan, tb_undangan.jumlah_undangan,
           tb_undangan.harga_undangan, tb_undangan.jenis_undangan, tb_undangan.deskripsi_undangan,
           tb_undangan.detail_undangan, tb_undangan.id_image, tb_image.image
    FROM tb_undangan
    LEFT JOIN tb_image ON tb_undangan.id_image = tb_image.id_image
";

$list_data_undangan = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Data Undangan</title>
    <!-- Link ke CSS (Pastikan CSS berada di file terpisah atau di bagian <style>) -->
    <style>
    /* Styling untuk kolom Deskripsi dan Detail Undangan */
    td.undangan-deskripsi,
    td.undangan-detail {
        white-space: normal;
        /* Membuat teks bisa dibungkus */
        word-wrap: break-word;
        /* Memungkinkan kata-kata panjang untuk terputus dan dibungkus */
        max-width: 250px;
        /* Menentukan lebar maksimal kolom */
        overflow: hidden;
        /* Menyembunyikan teks yang melebihi batas */
        text-overflow: ellipsis;
        /* Menambahkan '...' jika teks terlalu panjang */
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> List Data Undangan</h1>
            </div>
        </div>
        <p class="mb-4">The list of Data Undangan Product is displayed below. Use the search or filter options to find
            the
            account you're looking for. For more details, click on the relevant account. official DataTables
            documentation
        </p>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Data Undangan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th>Nama Undangan</th>
                                <th>Jumlah Undangan</th>
                                <th>Harga Undangan</th>
                                <th>Jenis Undangan</th>
                                <th class="undangan-deskripsi">Deskripsi Undangan</th> <!-- Kelas ditambahkan -->
                                <th class="undangan-detail">Detail Undangan</th> <!-- Kelas ditambahkan -->
                                <th>Gambar</th>
                                <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0; ?>
                            <?php foreach($list_data_undangan as $row) : ?>
                            <tr>
                                <td style="text-align: center"><?= $no = $no + 1; ?></td>
                                <td><?=$row['nama_undangan'];?></td>
                                <td><?=$row['jumlah_undangan'];?></td>
                                <td><?= $row['harga_undangan']; ?></td>
                                <td><?=$row['jenis_undangan'];?></td>
                                <td class="undangan-deskripsi"><?=$row['deskripsi_undangan'];?></td>
                                <!-- Kelas ditambahkan -->
                                <td class="undangan-detail"><?=$row['detail_undangan'];?></td>
                                <!-- Kelas ditambahkan -->

                                <td style="text-align: center;">
                                    <?php
                                    // Memeriksa apakah kolom image bernilai NULL atau kosong
                                    if (empty($row["image"])) {
                                        echo "<p>Gambar tidak tersedia</p>";
                                    } else {
                                        // Memisahkan string gambar berdasarkan koma
                                        $gambar_array = explode(',', $row["image"]); // Mengubah string menjadi array

                                        // Menampilkan semua gambar yang ada dalam array
                                        $is_image_found = false; // Untuk mengecek apakah ada gambar yang ditemukan
                                        foreach ($gambar_array as $gambar) {
                                            // Memastikan gambar ditemukan dan jalur file benar
                                            $image_path = 'image/product_image/' . $gambar;
                                            if (file_exists($image_path)) {
                                                echo "<img src='$image_path' style='width: 80px; margin-right: 10px;' />";
                                                $is_image_found = true; // Set gambar ditemukan
                                            }
                                        }

                                        // Jika tidak ada gambar ditemukan di array, tampilkan pesan
                                        if (!$is_image_found) {
                                            echo "<p>Gambar tidak tersedia</p>";
                                        }
                                    }
                                ?>
                                </td>

                                <td style="text-align: center; white-space: nowrap;">
                                    <a href="index_admin.php?page=UbahUndangan&id_undangan=<?= $row['id_undangan']; ?>"
                                        class="btn btn-success btn-sm" role="button" title="Ubah Data User">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <a href="pages/products/undangan/proses/proses_hapus_undangan.php?id_undangan=<?=$row['id_undangan'];?>"
                                        class="btn btn-danger btn-sm" role="button" title="Hapus Data "
                                        onclick="return confirm('Apakah anda yakin?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>