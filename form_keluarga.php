<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = ""; $no_kk = ""; $nama_kepala = ""; $alamat = ""; $kondisi = ""; $kategori = "";
$mode = "Tambah";

if (isset($_GET['edit'])) {
    $mode = "Ubah";
    $id = mysqli_real_escape_string($conn, $_GET['edit']);
    $query = mysqli_query($conn, "SELECT * FROM keluarga WHERE id_keluarga='$id'");
    $data = mysqli_fetch_assoc($query);
    
    if ($data) {
        $no_kk = $data['no_kk'];
        $nama_kepala = $data['nama_kepala'];
        $alamat = $data['alamat'];
        $kondisi = $data['kondisi_rumah'];
        $kategori = $data['kategori_miskin'];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Data Keluarga - Sistem Bansos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = { theme: { extend: { fontFamily: { sans: ['Poppins', 'sans-serif'] } } } }
    </script>
</head>
<body class="bg-[#f8fafc] font-sans min-h-screen flex flex-col justify-between text-slate-800">

    <main class="max-w-xl w-full mx-auto p-4 my-auto animate__animated animate__zoomIn animate__fast">
        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-6 md:p-10">
            <span class="text-xs font-bold uppercase tracking-widest text-blue-600 bg-blue-50 px-3 py-1 rounded-full">Input Panel</span>
            <h3 class="font-bold text-2xl text-slate-900 mt-2 mb-1 tracking-tight">Formulir Data Keluarga</h3>
            <p class="text-slate-400 text-xs md:text-sm mb-6">Lengkapi data indikator kemiskinan penduduk di bawah ini.</p>
            <hr class="border-slate-100 mb-6">

            <form action="" method="POST" class="space-y-5">
                <input type="hidden" name="id_keluarga" value="<?= $id; ?>">

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">No Kartu Keluarga</label>
                    <input type="text" name="no_kk" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white focus:outline-none rounded-xl px-4 py-2.5 text-sm transition-all font-mono tracking-wide" value="<?= htmlspecialchars($no_kk); ?>" placeholder="Masukkan 16 digit No KK" required autocomplete="off">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Nama Kepala Keluarga</label>
                    <input type="text" name="nama_kepala" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white focus:outline-none rounded-xl px-4 py-2.5 text-sm transition-all" value="<?= htmlspecialchars($nama_kepala); ?>" placeholder="Nama lengkap kepala keluarga" required autocomplete="off">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Alamat Domisili</label>
                    <textarea name="alamat" rows="3" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white focus:outline-none rounded-xl px-4 py-2.5 text-sm transition-all" placeholder="Tuliskan nama jalan, RT/RW, dan kelurahan" required><?= htmlspecialchars($alamat); ?></textarea>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Kondisi Kelayakan Rumah</label>
                    <div class="relative">
                        <select name="kondisi_rumah" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white focus:outline-none rounded-xl px-4 py-2.5 text-sm transition-all appearance-none" required>
                            <option value="" disabled <?= ($kondisi == '') ? 'selected' : ''; ?>>-- Pilih Kondisi Rumah --</option>
                            <option value="Layak" <?= ($kondisi == 'Layak') ? 'selected' : ''; ?>>Layak</option>
                            <option value="Tidak Layak" <?= ($kondisi == 'Tidak Layak') ? 'selected' : ''; ?>>Tidak Layak</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-1.5">Masuk Kategori Miskin</label>
                    <div class="relative">
                        <select name="kategori_miskin" class="w-full bg-slate-50 border border-slate-200 focus:border-blue-500 focus:bg-white focus:outline-none rounded-xl px-4 py-2.5 text-sm transition-all appearance-none" required>
                            <option value="" disabled <?= ($kategori == '') ? 'selected' : ''; ?>>-- Pilih Kategori --</option>
                            <option value="Ya" <?= ($kategori == 'Ya') ? 'selected' : ''; ?>>Ya</option>
                            <option value="Tidak" <?= ($kategori == 'Tidak') ? 'selected' : ''; ?>>Tidak</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <a href="dashboard.php" class="w-1/2 bg-white hover:bg-slate-50 text-slate-500 font-semibold text-center py-3 rounded-xl border border-slate-200 transition-colors text-sm">Batal</a>
                    <button type="submit" name="simpan" class="w-1/2 bg-gradient-to-r from-slate-900 to-slate-800 hover:from-slate-800 hover:to-slate-700 text-white font-semibold py-3 rounded-xl shadow-md transition-all text-sm">Simpan Data</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-slate-900 text-slate-500 text-center py-4 text-xs border-t border-slate-800">
        <p>&copy; 2026 <span class="text-slate-400">Sistem Bantuan Sosial</span>. All rights reserved.</p>
    </footer>

    <?php
    if (isset($_POST['simpan'])) {
        $no_kk_post = mysqli_real_escape_string($conn, $_POST['no_kk']);
        $nama_post = mysqli_real_escape_string($conn, $_POST['nama_kepala']);
        $alamat_post = mysqli_real_escape_string($conn, $_POST['alamat']);
        $kondisi_post = mysqli_real_escape_string($conn, $_POST['kondisi_rumah']);
        $kategori_post = mysqli_real_escape_string($conn, $_POST['kategori_miskin']);

        if ($_POST['id_keluarga'] == "") {
            mysqli_query($conn, "INSERT INTO keluarga (no_kk, nama_kepala, alamat, kondisi_rumah, kategori_miskin) 
                                 VALUES ('$no_kk_post', '$nama_post', '$alamat_post', '$kondisi_post', '$kategori_post')");
            echo "<script>
                Swal.fire({
                    title: 'Berhasil Ditambahkan!',
                    text: 'Record data keluarga baru telah disimpan.',
                    icon: 'success',
                    timer: 1800,
                    showConfirmButton: false
                }).then(function() { window.location='dashboard.php'; });
            </script>";
        } else {
            $id_post = mysqli_real_escape_string($conn, $_POST['id_keluarga']);
            mysqli_query($conn, "UPDATE keluarga SET no_kk='$no_kk_post', nama_kepala='$nama_post', alamat='$alamat_post', 
                                 kondisi_rumah='$kondisi_post', kategori_miskin='$kategori_post' WHERE id_keluarga='$id_post'");
            echo "<script>
                Swal.fire({
                    title: 'Berhasil Diperbarui!',
                    text: 'Perubahan data keluarga berhasil disinkronisasi.',
                    icon: 'success',
                    timer: 1800,
                    showConfirmButton: false
                }).then(function() { window.location='dashboard.php'; });
            </script>";
        }
    }
    ?>
</body>
</html>