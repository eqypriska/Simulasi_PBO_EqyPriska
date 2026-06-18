<?php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik Reguler
    private $pilihanProdi;
    private $lokasiKampus;

    // Constructor
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $pilihanProdi, $lokasiKampus) {
        // Memanggil constructor dari parent class (Pendaftaran)
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    // Overriding metode hitungTotalBiaya() untuk Jalur Reguler
    public function hitungTotalBiaya() {
        // Tarif standar murni tanpa biaya tambahan
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Reguler";
    }

    // Metode Query Spesifik untuk mengambil data Reguler
    public static function getDaftarReguler($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, pilihan_prodi, lokasi_kampus 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Reguler'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Getter untuk properti spesifik
    public function getPilihanProdi() { return $this->pilihanProdi; }
    public function getLokasiKampus() { return $this->lokasiKampus; }
}
?>