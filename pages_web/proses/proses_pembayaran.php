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

        $_SESSION['order_status'] = 'pending';

        // Ambil nomor HP dan username dari session (misalnya setelah login)
        $no_hp = isset($_SESSION['no_hp']) ? $_SESSION['no_hp'] : ''; // Pastikan session no_hp ada
        $username = isset($_SESSION['username']) ? $_SESSION['username'] : ''; // Pastikan session username ada

        if ($no_hp && $username) {
            // Mengubah nomor HP ke format yang dimulai dengan 62
            if (substr($no_hp, 0, 2) === '08') {
                // Jika nomor HP dimulai dengan '08', ganti menjadi '62'
                $no_hp = '628' . substr($no_hp, 2);
            } elseif (substr($no_hp, 0, 3) === '628') {
                // Jika nomor HP sudah dimulai dengan '628', biarkan saja
                $no_hp = $no_hp;
            } else {
                // Jika nomor HP memiliki format yang tidak dikenal
                echo "<script>
                    alert('Nomor HP tidak valid.');
                    window.location.href = '../alert.php'; // Arahkan ke halaman lain jika nomor HP tidak valid
                  </script>";
                exit;
            }
            
            // Dekode JSON items
            $itemsArray = json_decode($items, true);

            // Buat pesan WhatsApp dengan format rapi
            $message = "Pemesanan Undangan => \n\n";
            $message .= "User ID: $user_id\n";
            $message .= "Nama Pemesan: $username\n";
            $message .= "Total: Rp " . number_format($total, 0, ',', '.') . "\n\n";
            $message .= "Items:\n";

            foreach ($itemsArray as $item) {
                $message .= "  ID: " . $item['id'] . "\n";
                $message .= " Nama: " . $item['name'] . "\n";
                $message .= "  Harga: Rp " . number_format($item['price'], 0, ',', '.') . "\n";
                $message .= "  Jumlah: " . $item['quantity'] . "\n\n";
            }

            // Encode pesan untuk URL
            $message = urlencode($message);

            // URL WhatsApp
            $whatsappUrl = "https://wa.me/$no_hp?text=$message";

            // Hapus cart setelah pemesanan berhasil
            unset($_SESSION['cart']); // Menghapus cart dari session

            // Redirect ke WhatsApp setelah berhasil pemesanan
            echo "<script>
                alert('Pemesanan berhasil! Terima kasih telah memesan.');
                window.location.href = '$whatsappUrl'; // Arahkan ke WhatsApp
              </script>";
        } else {
            echo "<script>
                alert('Nomor HP atau Username tidak ditemukan dalam session.');
                window.location.href = '../alerlt.php'; // Arahkan ke halaman lain jika session tidak ada
              </script>";
        }
        exit;

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "Data yang diperlukan tidak ditemukan.";
}
?>