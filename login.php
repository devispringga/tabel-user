<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

include 'con.php';

$username = $_POST['username'];
$password = $_POST['password'];

try {
    $statement = $database_connection->prepare("SELECT * FROM users WHERE username = ?");
    $statement->execute([$username]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        echo json_encode([
            "status" => "success",
            "message" => "Login berhasil",
            "data" => [
                "username" => $user['username'],
                "role" => $user['role']
            ]
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Username atau password salah"
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Terjadi kesalahan: " . $e->getMessage()
    ]);
}
?>
