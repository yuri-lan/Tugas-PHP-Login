<?php
session_start();
include 'config.php';

// 1. Cek apakah udah login?
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// 2. Cek Hak Akses: Apakah dia Admin?
if ($_SESSION['role'] != 'admin') {
    // Kalau bukan admin, tendang balik ke dashboard!
    echo "<script>alert('Akses Ditolak! Halaman ini khusus Admin.'); window.location='dashboard.php';</script>";
    exit;
}

// 3. Ambil data user dari database
$query = "SELECT id, username, role FROM users";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Data User - Admin</title>
    <style>
        body { font-family: system-ui, sans-serif; background: #fdf3e7; margin: 0; padding: 0; }
        .navbar { background: #8a1f36; padding: 15px 50px; display: flex; justify-content: space-between; align-items: center; color: white; }
        .navbar a { color: #ff9e6d; text-decoration: none; font-weight: bold; }
        .container { max-width: 800px; margin: 50px auto; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(138, 31, 54, 0.15); }
        h2 { color: #8a1f36; margin-top: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #f0cfb5; }
        th { background: #fffaf2; color: #8a1f36; }
        tr:hover { background: #fdf3e7; }
        .btn-back { display: inline-block; padding: 10px 20px; background: #ff9e6d; color: #5a0f22; text-decoration: none; border-radius: 8px; font-weight: bold; margin-bottom: 20px; }
    </style>
</head>
<body>

    <div class="navbar">
        <h2 style="margin: 0;">Panel Admin</h2>
        <div>
            Halo, <strong><?= $_SESSION['username']; ?></strong> 
            <a href="logout.php" style="margin-left: 20px;">Logout</a>
        </div>
    </div>

    <div class="container">
        <a href="dashboard.php" class="btn-back">Kembali ke Dashboard</a>
        
        <h2>Daftar Pengguna Sistem</h2>
        <p>Di halaman ini, kamu bisa melihat semua user yang terdaftar di database.</p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Hak Akses (Role)</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['username']; ?></td>
                        <td>
                            <strong><?= strtoupper($row['role']); ?></strong>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>
</html>