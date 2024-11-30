<?php
require("conf/db_conn.php"); // Mengimpor file koneksi database untuk dapat mengakses database dan menjalankan query.
$query = "SELECT * FROM tb_user"; // Menyusun query SQL untuk mengambil semua data dari tabel tb_user.
$daftar_user = mysqli_query($conn, $query); // Menjalankan query pada database dan menyimpan hasilnya dalam variabel $daftar_user.
?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row mb-2">
        <div class="col-sm-12">
            <h1 class="h3 mb-2 text-gray-800">Admin <i class="fas fa-angle-right"></i> List Account</h1>
            <!-- Judul halaman yang menunjukkan halaman List Account -->
        </div>
    </div>
    <p class="mb-4">The list of registered accounts is displayed below. Use the search or filter options to find the
        account you're looking for. For more details, click on the relevant account. official DataTables documentation
    </p>
    <!-- Deskripsi halaman untuk memberikan informasi kepada pengguna mengenai fungsi daftar akun dan pencarian/filter -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Account</h6> <!-- Judul card bagian List Account -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!-- Membuat tabel yang responsif untuk menampilkan daftar akun -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th> <!-- Kolom untuk menampilkan nomor urut -->
                            <th>Nama</th> <!-- Kolom untuk menampilkan nama pengguna -->
                            <th>Email</th> <!-- Kolom untuk menampilkan email pengguna -->
                            <th>Nomor HP</th> <!-- Kolom untuk menampilkan nomor HP pengguna -->
                            <th>Role</th> <!-- Kolom untuk menampilkan jabatan pengguna -->
                            <th style="text-align: center">Aksi</th>
                            <!-- Kolom untuk menampilkan tombol aksi (edit dan hapus) -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0; ?>
                        <!-- Variabel untuk nomor urut -->
                        <?php foreach($daftar_user as $row) : ?>
                        <!-- Loop untuk menampilkan data setiap pengguna -->
                        <tr>
                            <td style="text-align: center"><?= $no = $no + 1; ?></td> <!-- Menampilkan nomor urut -->
                            <td><?=$row['username'];?></td> <!-- Menampilkan nama pengguna -->
                            <td><?=$row['email'];?></td> <!-- Menampilkan email pengguna -->
                            <td><?= $row['no_hp']; ?></td> <!-- Menampilkan nomor HP pengguna -->
                            <td><?=$row['role'];?></td> <!-- Menampilkan jabatan pengguna -->
                            <td style="text-align: center; white-space: nowrap;">
                                <!-- Tombol Edit untuk mengubah data pengguna -->
                                <a href="index_admin.php?page=ubah_user&id=<?= $row['id']; ?>"
                                    class="btn btn-success btn-sm" role="button" title="Ubah Data User">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- Tombol Hapus untuk menghapus data pengguna, dengan konfirmasi sebelum menghapus -->
                                <a href="pages/admin/proses/proses_hapus_user.php?id=<?=$row['id'];?>"
                                    class="btn btn-danger btn-sm" role="button" title="Hapus Data User"
                                    onclick="return confirm('Apakah anda yakin?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <!-- Mengakhiri loop untuk menampilkan data pengguna -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->