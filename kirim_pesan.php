<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HKBP Sion Kota - Beranda</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <header>
        <div class="container">
            <h1 class="logo">HKBP Sion Kota</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Beranda</a></li>
                    <li><a href="jadwal.html">Jadwal Kebaktian</a></li>
                    <li><a href="berita.html">Berita</a></li>
                    <li><a href="kontak.html">Kontak</a></li>
                    <li><a href="tentang.html">Organisasi</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <?php
    // 1. Koneksi ke database
    $servername = "localhost";  // Ganti dengan host database Anda (misalnya localhost)
    $username = "root";         // Ganti dengan username MySQL Anda
    $password = "";             // Ganti dengan password MySQL Anda
    $dbname = "hkbp_sion_kota"; // Nama database yang telah dibuat sebelumnya
    
    // Membuat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // 2. Mendapatkan data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // 3. Menyimpan data ke dalam tabel pesan
    $sql = "INSERT INTO pesan (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        // Jika berhasil, tampilkan pesan sukses
        echo "Pesan Anda telah terkirim! Terima kasih.";
    } else {
        // Jika ada error, tampilkan pesan error
        echo "Terjadi kesalahan: " . $sql . "<br>" . $conn->error;
    }

    // Menutup koneksi
    $conn->close();
    ?>