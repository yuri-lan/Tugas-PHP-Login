<?php
session_start();
include 'config.php';

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
}

$error = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cari user berdasarkan username (pakai prepared statement biar aman dari SQL Injection)
    $stmt = $koneksi->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verifikasi password hash
        if (password_verify($password, $row['password'])) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role']; // Simpan hak akses
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!-- HTML form login tetap sama persis seperti sebelumnya -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem</title>
    <style>
        body { font-family: system-ui, sans-serif; background: linear-gradient(135deg, #8a1f36, #ff9e6d); display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .login-box { background: #fdf3e7; padding: 40px; border-radius: 20px; box-shadow: 0 15px 30px rgba(0,0,0,0.2); width: 100%; max-width: 350px; text-align: center; }
        h2 { color: #8a1f36; margin-top: 0; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #f0cfb5; border-radius: 8px; box-sizing: border-box; background: #fffaf2; }
        button { width: 100%; padding: 12px; background: #8a1f36; color: white; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; margin-top: 10px; transition: 0.3s; }
        button:hover { background: #5a0f22; }
        .error { color: red; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Menu Login</h2>
        <p style="color: #7a4553; font-size: 14px;">Silakan masuk untuk mengakses sistem</p>
        <?php if($error): ?>
            <div class="error"><?= $error; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Masuk</button>
        </form>
    </div>
</body>
</html>