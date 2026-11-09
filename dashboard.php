<?php
session_start();

// Hak Akses: Wajib Login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { font-family: system-ui, sans-serif; background: #fdf3e7; margin: 0; padding: 0; }
        .navbar { background: #8a1f36; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; color: white; }
        .navbar a { color: #ff9e6d; text-decoration: none; font-weight: bold; }
        .container { max-width: 800px; margin: 50px auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(138, 31, 54, 0.15); }
        h1 { color: #8a1f36; margin-top: 0; }
        .badge { display: inline-block; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; color: white; }
        .badge.admin { background: #ff9e6d; color: #5a0f22; }
        .badge.user { background: #7a4553; }
        .menu-box { margin-top: 30px; padding: 20px; border: 2px dashed #f0cfb5; border-radius: 10px; background: #fffaf2; }
    </style>
</head>
<body>

    <div class="navbar">
        <h2 style="margin: 0;">Sistem Informasi</h2>
        <div>
            Halo, <strong><?= $_SESSION['username']; ?></strong> 
            <a href="logout.php" style="margin-left: 20px;">Logout</a>
        </div>
    </div>

    <div class="container">
        <h1>Dashboard</h1>
        <p>Selamat datang di halaman utama. Kamu berhasil login.</p>
        
        <p>Hak Akses Kamu: 
            <span class="badge <?= $_SESSION['role']; ?>">
                <?= strtoupper($_SESSION['role']); ?>
            </span>
        </p>

        <!-- HAK AKSES KHUSUS ADMIN -->
        <?php if ($_SESSION['role'] == 'admin'): ?>
            <div class="menu-box">
                <h3 style="color: #8a1f36; margin-top: 0;">Menu Khusus Admin</h3>
                <p>Karena kamu Admin, kamu bisa mengakses fitur rahasia ini:</p>
                <a href="kelola_user.php" style="display: inline-block; padding: 10px 20px; background: #8a1f36; color: white; text-decoration: none; border-radius: 8px; margin-top: 10px;">Kelola Data User</a>
            </div>
        <?php else: ?>
            <div class="menu-box" style="border-color: #ddd;">
                <h3 style="color: #555; margin-top: 0;">Menu User Biasa</h3>
                <p>Kamu tidak memiliki akses ke menu Admin.</p>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>