<?php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik Kedinasan
    private $skIkatanDinas;
    private $instansiSponsor;

    // Constructor
    public function __construct($id, $nama, $sekolah, $nilai, $biayaDasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id, $nama, $sekolah, $nilai, $biayaDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    // Overriding metode hitungTotalBiaya() untuk Jalur Kedinasan
    public function hitungTotalBiaya() {
        // Dikenakan surcharge administrasi khusus sebesar 25% (dikali 1.25)
        return $this->biayaPendaftaranDasar * 1.25;
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Kedinasan";
    }

    // Metode Query Spesifik untuk mengambil data Kedinasan
    public static function getDaftarKedinasan($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Kedinasan'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Getter untuk properti spesifik
    public function getSkIkatanDinas() { return $this->skIkatanDinas; }
    public function getInstansiSponsor() { return $this->instansiSponsor; }
}
?>