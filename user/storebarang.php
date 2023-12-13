<?php
require_once '../helper/connection.php';
require_once '../layoutuser/_top.php';

// Periksa koneksi
if ($connection->connect_error) {
    die("Koneksi gagal: " . $connection->connect_error);
}

$query = "SELECT * FROM penitip WHERE nim_nidn = ? AND nama = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("ss", $nim_nidn, $nama);
$stmt->execute();

if (!$stmt->execute()) {
    die('Error: ' . $stmt->error);
}

$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $idpmj = $row["id_peminjam"];

    echo $idpmj;
    if (isset($_POST['cari'])) {
        $jam_pinjam = $_POST['jam_pinjam'];
        $kode_peminjaman = $_POST['kode_peminjaman'];

        $stmtCheckPenitip = $connection->prepare("SELECT * FROM penitip WHERE id_peminjam = ?");
        $stmtCheckPenitip->bind_param("s", $idpmj);
        $stmtCheckPenitip->execute();
        $resultCheckPenitip = $stmtCheckPenitip->get_result();

        $query_admin = "SELECT id_admin FROM admin WHERE email='admin@gmail.com'";
        $result_admin = $connection->query($query_admin);

        if ($result_admin->num_rows > 0) {
            $row_admin = $result_admin->fetch_assoc();
            $idadmin = $row_admin["id_admin"];

            // Cari nomor loker yang belum terpakai
            $sqlCariLoker = "SELECT no FROM locker WHERE status= 'kosong' LIMIT 1";
            $resultCariLoker = $connection->query($sqlCariLoker);

            if ($resultCariLoker->num_rows > 0) {
                $row = $resultCariLoker->fetch_assoc();
                $noLoker = $row['no'];

                $insertlaporan = "INSERT INTO info_pinjam(kode_pinjam, jam_pinjam, no_loker, id_admin, id_peminjam) VALUES (?, ?, ?, ?, ?)";
                $stmtInsertLaporan = $connection->prepare($insertlaporan);
                $stmtInsertLaporan->bind_param("sssss", $kode_peminjaman, $jam_pinjam, $noLoker, $idadmin, $idpmj);
                $resultInsertLaporan = $stmtInsertLaporan->execute();

                $sqlSimpanPeminjam = "UPDATE penitip SET no = '$noLoker' WHERE id_peminjam = '$idpmj'";
                $resultSimpanPeminjam = $connection->query($sqlSimpanPeminjam);

                if($resultInsertLaporan){                
                    // Baru setelah penyimpanan peminjam berhasil, update status loker
                    $sqlUpdateLoker = "UPDATE locker SET status = 'terpakai', id_admin = '$idadmin', id_peminjam = '$idpmj', jam_pinjam = '$jam_pinjam' WHERE no = $noLoker";
                    $resultUpdateLoker = $connection->query($sqlUpdateLoker);
                       
                    if ($resultUpdateLoker && $resultSimpanPeminjam) {
                        echo '<h1>No Loker: ' . $noLoker . ' berhasil disimpan untuk ' . $nama . '</h1>';
                        echo '<br><a href="indexbarang.php" class="btn btn-warning">Cek Data Peminjaman</a>';
                    } else {
                        echo "Gagal menyimpan data peminjam. "; // Tampilkan kesalahan MySQL untuk debugging
                        // Catat kesalahan ke file atau database untuk analisis lebih lanjut
                    }
                }
                } 
            }
            } else {
                echo "Gagal menyimpan data peminjam. " . $resultSimpanPeminjam->error; // Tampilkan kesalahan MySQL untuk debugging
                // Catat kesalahan ke file atau database untuk analisis lebih lanjut
            }
        }
     else {
        echo "<h1>Maaf, tidak ada loker yang tersedia.</h1>";
        echo "<br><a class='btn btn-warning' href='index.php'>Kembali</a>";
    }

// Tutup koneksi
$connection->close();
?>
