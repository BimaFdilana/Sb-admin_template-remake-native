<?php
session_start();

// Pastikan form data ada
if (isset($_POST['user_id'], $_POST['total'], $_POST['items'])) {
    $user_id = $_POST['user_id'];
    $total = $_POST['total'];
    $items = $_POST['items']; // Ini berupa JSON yang bisa Anda decode

    // Koneksi ke database (misalnya menggunakan PDO)
    $dsn = 'mysql:host=localhost;dbname=db_undangan';
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        $pdo = new PDO($dsn, $username, $password, $options);

        // Insert data pesanan ke tb_pesanan
        $sql = "INSERT INTO tb_pesanan (user_id, total, items, status, created_at) 
                VALUES (:user_id, :total, :items, 'pending', NOW())";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':user_id' => $user_id,
            ':total' => $total,
            ':items' => $items,
        ]);

        unset($_SESSION['cart']);
        // Redirect ke halaman sukses atau halaman konfirmasi
         echo "<script>
            alert('Pemesanan berhasil! Terima kasih telah memesan.');
            window.location.href='../alerlt.php';  // Arahkan ke halaman utama
          </script>";
        exit;

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "Data yang diperlukan tidak ditemukan.";
}
?>