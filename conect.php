<?php
$database_hostname = "localhost";
$database_user = "novx1544_devis";
$database_password = "Devis@12345";
$database_name = "novx1544_devis";

try {
    $database_connection = new PDO("mysql:host=$database_hostname;dbname=$database_name", $database_user, $database_password);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
?>

