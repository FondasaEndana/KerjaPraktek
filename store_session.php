<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

if ($data && isset($data['user'])) {
    // Memeriksa apakah login dilakukan melalui Google
    if (isset($data['loginType']) && $data['loginType'] === 'google') {
        $_SESSION['user'] = $data['user'];
        $_SESSION['user']['loginType'] = 'google'; // Menyimpan jenis login
    } else {
        // Login biasa atau jenis login lainnya
        $_SESSION['user'] = $data['user'];
        $_SESSION['user']['loginType'] = 'regular'; // Menyimpan jenis login sebagai login biasa
    }
    
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid data']);
}
?>
