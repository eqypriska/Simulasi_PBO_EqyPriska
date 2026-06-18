<?php
// Tautkan file koneksi dan semua kelas yang dibutuhkan
require_once 'koneksi/database.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

// 1. Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getConnection();

// 2. Ambil Data Menggunakan Metode Query Spesifik (Tahap 4)
$dataReguler   = PendaftaranReguler::getDaftarReguler($db);
$dataPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi PBO - Pendaftaran Mahasiswa Baru</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background-color: #f4f6f9; }
        h1 { text-align: center; color: #333; }
        h2 { color: #2c3e50; border-bottom: 2px solid #2c3e50; padding-bottom: 5px; margin-top: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #2c3e50; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .text-right { text-align: right; }
        .badge { padding: 4px 8px; background: #e74c3c; color: white; border-radius: 4px; font-size: 12px; }
    </style>
</head>
<body>

    <h1>SISTEM INFORMASI PENDAFTARAN MAHASISWA BARU</h1>
    <p style="text-align: center;">Menggunakan Pendekatan Pemrograman Berorientasi Objek (OOP) & Polimorfisme</p>

    <h2>Daftar Jalur Reguler</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Pilihan Prodi</th>
                <th>Lokasi Kampus</th>
                <th>Info Jalur</th>
                <th>Biaya Dasar</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataReguler as $row): 
                // Instansiasi Objek Konkrit untuk memanfaatkan Polimorfisme
                $mhs = new PendaftaranReguler(
                    $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                    $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                    $row['pilihan_prodi'], $row['lokasi_campust'] ?? $row['lokasi_kampus']
                );
            ?>
            <tr>
                <td><?= $mhs->getIdPendaftaran(); ?></td>
                <td><strong><?= $mhs->getNamaCalon(); ?></strong></td>
                <td><?= $mhs->getAsalSekolah(); ?></td>
                <td><?= $mhs->getNilaiUjian(); ?></td>
                <td><?= $mhs->getPilihanProdi(); ?></td>
                <td><?= $mhs->getLokasiKampus(); ?></td>
                <td><span class="badge"><?= $mhs->tampilkanInfoJalur(); ?></span></td>
                <td class="text-right">Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                <td class="text-right" style="font-weight: bold; color: #27ae60;">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <h2>Daftar Jalur Prestasi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>Jenis Prestasi</th>
                <th>Tingkat Prestasi</th>
                <th>Info Jalur</th>
                <th>Biaya Dasar</th>
                <th>Total Biaya (Diskon Rp50rb)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataPrestasi as $row): 
                $mhs = new PendaftaranPrestasi(
                    $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                    $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                    $row['jenis_prestasi'], $row['tingkat_prestasi']
                );
            ?>
            <tr>
                <td><?= $mhs->getIdPendaftaran(); ?></td>
                <td><strong><?= $mhs->getNamaCalon(); ?></strong></td>
                <td><?= $mhs->getAsalSekolah(); ?></td>
                <td><?= $mhs->getNilaiUjian(); ?></td>
                <td><?= $mhs->getJenisPrestasi(); ?></td>
                <td><?= $mhs->getTingkatPrestasi(); ?></td>
                <td><span class="badge" style="background-color: #2980b9;"><?= $mhs->tampilkanInfoJalur(); ?></span></td>
                <td class="text-right">Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                <td class="text-right" style="font-weight: bold; color: #27ae60;">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


    <h2>Daftar Jalur Kedinasan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Calon</th>
                <th>Asal Sekolah</th>
                <th>Nilai Ujian</th>
                <th>SK Ikatan Dinas</th>
                <th>Instansi Sponsor</th>
                <th>Info Jalur</th>
                <th>Biaya Dasar</th>
                <th>Total Biaya (+Surcharge 25%)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataKedinasan as $row): 
                $mhs = new PendaftaranKedinasan(
                    $row['id_pendaftaran'], $row['nama_calon'], $row['asal_sekolah'], 
                    $row['nilai_ujian'], $row['biaya_pendaftaran_dasar'], 
                    $row['sk_ikatan_dinas'], $row['instansi_sponsor']
                );
            ?>
            <tr>
                <td><?= $mhs->getIdPendaftaran(); ?></td>
                <td><strong><?= $mhs->getNamaCalon(); ?></strong></td>
                <td><?= $mhs->getAsalSekolah(); ?></td>
                <td><?= $mhs->getNilaiUjian(); ?></td>
                <td><?= $mhs->getSkIkatanDinas(); ?></td>
                <td><?= $mhs->getInstansiSponsor(); ?></td>
                <td><span class="badge" style="background-color: #27ae60;"><?= $mhs->tampilkanInfoJalur(); ?></span></td>
                <td class="text-right">Rp <?= number_format($mhs->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                <td class="text-right" style="font-weight: bold; color: #c0392b;">Rp <?= number_format($mhs->hitungTotalBiaya(), 0, ',', '.'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>