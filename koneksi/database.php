<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    // Sesuaikan dengan nama database Anda di Tahap 1
    private $db_name = "db_simulasi_pbo_ti1d_eqypriska"; 
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            // Mengeset error mode ke Exception untuk kemudahan debugging
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>