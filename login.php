<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Sistem Bansos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = { theme: { extend: { fontFamily: { sans: ['Poppins', 'sans-serif'] } } } }
    </script>
</head>
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-850 flex flex-col justify-center items-center min-h-screen p-4 text-slate-800 relative overflow-hidden">
    
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-emerald-600/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="bg-white/95 backdrop-blur-lg max-w-md w-full p-8 md:p-10 rounded-3xl shadow-2xl border border-white/20 text-center relative z-10 animate__animated animate__fadeInUp">
        <div class="bg-gradient-to-br from-blue-600 to-blue-700 text-white inline-flex p-4 rounded-2xl mb-4 shadow-lg shadow-blue-500/30">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
        </div>
        
        <h3 class="font-bold text-2xl text-slate-900 mb-1 tracking-tight">Login Admin</h3>
        <p class="text-slate-400 text-xs md:text-sm mb-8">Masukkan akun terdaftar untuk masuk ke panel dashboard</p>
        
        <form action="" method="POST" class="space-y-5">
            <div class="text-left">
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">Username</label>
                <input type="text" name="username" class="w-full bg-slate-50/80 border border-slate-200 focus:border-blue-500 focus:bg-white focus:outline-none rounded-xl px-4 py-3 text-sm transition-all shadow-inner" placeholder="Masukkan username admin" required autocomplete="off">
            </div>
            
            <div class="text-left">
                <label class="block text-xs font-semibold text-slate-500 uppercase tracking-widest mb-1.5">Password</label>
                <input type="password" name="password" class="w-full bg-slate-50/80 border border-slate-200 focus:border-blue-500 focus:bg-white focus:outline-none rounded-xl px-4 py-3 text-sm transition-all shadow-inner" placeholder="Masukkan password" required>
            </div>
            
            <button type="submit" name="login" class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 rounded-xl shadow-lg shadow-blue-500/20 hover:shadow-blue-500/30 transition-all text-sm font-medium mt-2">
                Autentikasi Masuk
            </button>
        </form>
        
        <div class="mt-8 pt-4 border-t border-slate-100">
            <a href="index.php" class="text-xs text-slate-400 hover:text-blue-600 transition-colors flex items-center justify-center gap-1">
                <span>←</span> Kembali ke Halaman Utama
            </a>
        </div>
    </div>

    <?php
    if (isset($_POST['login'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        
        if (mysqli_num_rows($query) > 0) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $username;
            echo "<script>
                Swal.fire({
                    title: 'Login Berhasil!',
                    text: 'Selamat datang kembali di sistem, Admin.',
                    icon: 'success',
                    timer: 1800,
                    showConfirmButton: false
                }).then(function() {
                    window.location='dashboard.php';
                });
            </script>";
        } else {
            echo "<script>
                Swal.fire({
                    title: 'Akses Ditolak!',
                    text: 'Username atau Password salah, silakan cek kembali.',
                    icon: 'error',
                    confirmButtonColor: '#2563eb'
                });
            </script>";
        }
    }
    ?>
</body>
</html>