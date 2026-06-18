<?php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik Prestasi
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Constructor
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // Overriding metode hitungTotalBiaya() untuk Jalur Prestasi
    public function hitungTotalBiaya() {
        // Mendapatkan potongan apresiasi prestasi sebesar Rp50.000
        return $this->biayaPendaftaranDasar - 50000;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Prestasi";
    }

    // Metode Query Spesifik untuk mengambil data Prestasi
    public static function getDaftarPrestasi($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jenis_prestasi, tingkat_prestasi 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Prestasi'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Getter untuk properti spesifik
    public function getJenisPrestasi() { return $this->jenisPrestasi; }
    public function getTingkatPrestasi() { return $this->tingkatPrestasi; }
}
?>