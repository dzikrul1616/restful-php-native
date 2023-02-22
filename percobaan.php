<?php

require "../newsapp/connect.php";
// Mendapatkan metode HTTP dan URI dari request
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'], '/'));

// Mendapatkan nama tabel
$table = 'tbl_users';
// Mendapatkan data dari request body jika ada
$data = json_decode(file_get_contents('php://input'), true);

// Menyiapkan pernyataan SQL berdasarkan metode HTTP dan URI
switch ($method) {
    case 'GET':
        $sql = "SELECT * FROM $table" . ($id ? " WHERE id_users=$id" : "");
        break;
    case 'POST':
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $level = $data['level'];
        $register_date = $data['register_date'];
        $sql = "INSERT INTO $table (username, email, password, level, register_date) VALUES ('$username', '$email', '$password', '$level', '$register_date')";
        break;
    case 'PUT':
        $username = $data['username'];
        $email = $data['email'];
        $password = $data['password'];
        $level = $data['level'];
        $register_date = $data['register_date'];
        $sql = "UPDATE $table SET username='$username', email='$email', password='$password', level='$level', register_date='$register_date' WHERE id_users=$id";
        break;
    case 'DELETE':
        $sql = "DELETE FROM $table WHERE id_users=$id";
        break;
}

// Menjalankan pernyataan SQL dan memeriksa keberhasilannya
$result = mysqli_query($conn, $sql);
if (!$result) {
    http_response_code(404);
    die(mysqli_error($conn));
}

// Mengirim data sebagai JSON
if ($method == 'GET') {
    header('Content-Type: application/json');
    echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
} elseif ($method == 'POST' || $method == 'PUT' || $method == 'DELETE') {
    header('Content-Type: application/json');
    echo json_encode(['success' => true]);
}

// Menutup koneksi
mysqli_close($conn);
