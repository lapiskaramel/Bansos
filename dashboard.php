<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    echo "<script>alert('Harap login terlebih dahulu!'); window.location='login.php';</script>";
    exit;
}

// Proses Hapus Data secara diam-diam setelah dikonfirmasi JS
if (isset($_GET['hapus'])) {
    $id = mysqli_real_escape_string($conn, $_GET['hapus']);
    mysqli_query($conn, "DELETE FROM keluarga WHERE id_keluarga='$id'");
    echo "<script>
        window.location='dashboard.php?terhapus=true';
    </script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Bantuan Sosial</title>
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

    <nav class="bg-slate-900 text-white shadow-xl px-4 py-4 sticky top-0 z-50 border-b border-slate-800">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <span class="font-bold tracking-widest text-xs md:text-sm uppercase bg-slate-800 px-3 py-1.5 rounded-xl border border-slate-700/50">
                🛡️ Panel Administrator
            </span>
            <div class="flex items-center gap-4 text-xs md:text-sm">
                <span class="text-slate-400 hidden sm:inline">Operator: <strong class="text-white font-semibold"><?= htmlspecialchars($_SESSION['username']); ?></strong></span>
                <button onclick="logoutKonfirmasi()" class="bg-rose-500/10 text-rose-400 hover:bg-rose-600 hover:text-white px-3 py-2 font-semibold rounded-xl text-xs transition-all border border-rose-500/20">Keluar</button>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl w-full mx-auto p-4 md:p-6 flex-grow mt-4 animate__animated animate__fadeIn">
        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 p-6 md:p-8">
            
            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 tracking-tight">Data Penerima Manfaat</h2>
                    <p class="text-slate-400 text-xs md:text-sm mt-0.5">Rekapitulasi data keluarga untuk kriteria klasifikasi bantuan sosial.</p>
                </div>
                <a href="form_keluarga.php" class="inline-flex justify-center items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-5 py-3 rounded-2xl shadow-lg shadow-blue-600/20 transition-all">+ Entri Data Baru</a>
            </div>

            <div class="relative mb-6">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.604 10.604z" />
                    </svg>
                </div>
                <input type="text" id="searchInput" class="w-full bg-slate-50 border border-slate-200/80 focus:border-blue-500 focus:bg-white focus:outline-none rounded-2xl pl-11 pr-4 py-3 text-sm transition-all text-slate-700 shadow-inner" placeholder="Pencarian cepat via Kartu Keluarga atau Nama Kepala Keluarga..." onkeyup="cariData()">
            </div>

            <div class="overflow-x-auto rounded-2xl border border-slate-100 shadow-sm">
                <table id="dataTable" class="w-full text-left border-collapse">
                    <thead class="bg-slate-50/70 text-slate-500 text-xs font-bold uppercase tracking-wider border-b border-slate-100">
                        <tr>
                            <th class="p-4 w-12 text-center">No</th>
                            <th class="p-4">Nomor KK</th>
                            <th class="p-4">Kepala Keluarga</th>
                            <th class="p-4">Kondisi Rumah</th>
                            <th class="p-4">Kategori Miskin</th>
                            <th class="p-4 text-center w-44">Aksi Kontrol</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        <?php
                        $no = 1;
                        $query = mysqli_query($conn, "SELECT * FROM keluarga ORDER BY id_keluarga DESC");
                        if(mysqli_num_rows($query) == 0) {
                            echo '<tr><td colspan="6" class="text-center p-8 text-slate-400">Belum ada indeks records keluarga terkumpul.</td></tr>';
                        }
                        while ($row = mysqli_fetch_assoc($query)) {
                        ?>
                        <tr class="hover:bg-slate-50/40 transition-colors">
                            <td class="p-4 text-center font-medium text-slate-400"><?= $no++; ?></td>
                            <td class="p-4 font-mono font-semibold text-slate-700 tracking-wide"><?= htmlspecialchars($row['no_kk']); ?></td>
                            <td class="p-4 font-medium text-slate-900"><?= htmlspecialchars($row['nama_kepala']); ?></td>
                            <td class="p-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-xl text-xs font-bold <?= ($row['kondisi_rumah'] == 'Layak') ? 'bg-emerald-50 text-emerald-700 border border-emerald-200/50' : 'bg-amber-50 text-amber-700 border border-amber-200/50'; ?>">
                                    <?= $row['kondisi_rumah']; ?>
                                </span>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-xl text-xs font-bold <?= ($row['kategori_miskin'] == 'Ya') ? 'bg-rose-50 text-rose-700 border border-rose-200/50' : 'bg-slate-100 text-slate-600'; ?>">
                                    <?= $row['kategori_miskin']; ?>
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="form_keluarga.php?edit=<?= $row['id_keluarga']; ?>" class="bg-amber-500 hover:bg-amber-600 text-white font-semibold text-xs px-3 py-2 rounded-xl transition-all shadow-sm">Ubah</a>
                                    <button onclick="hapusKonfirmasi('<?= $row['id_keluarga']; ?>')" class="bg-rose-600 hover:bg-rose-700 text-white font-semibold text-xs px-3 py-2 rounded-xl transition-all shadow-sm">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <footer class="bg-slate-900 text-slate-500 text-center py-4 text-xs border-t border-slate-800 mt-12">
        <p>&copy; 2026 <span class="text-slate-400">Sistem Bantuan Sosial</span>. All rights reserved.</p>
    </footer>

    <script>
        // Live Search Handler
        function cariData() {
            let input = document.getElementById("searchInput").value.toUpperCase();
            let table = document.getElementById("dataTable");
            let tr = table.getElementsByTagName("tr");
            for (let i = 1; i < tr.length; i++) {
                let tdKK = tr[i].getElementsByTagName("td")[1];
                let tdNama = tr[i].getElementsByTagName("td")[2];
                if (tdKK || tdNama) {
                    let txtValueKK = tdKK.textContent || tdKK.innerText;
                    let txtValueNama = tdNama.textContent || tdNama.innerText;
                    if (txtValueKK.toUpperCase().indexOf(input) > -1 || txtValueNama.toUpperCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }       
            }
        }

        // SweetAlert2 Konfirmasi Hapus Data
        function hapusKonfirmasi(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data yang dihapus tidak dapat dipulihkan kembali!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e11d48',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus Data!',
                cancelButtonText: 'Batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'dashboard.php?hapus=' + id;
                }
            })
        }

        // SweetAlert2 Konfirmasi Keluar/Logout
        function logoutKonfirmasi() {
            Swal.fire({
                title: 'Ingin Logout?',
                text: "Sesi login administrator Anda akan diakhiri.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3b82f6',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Keluar!',
                cancelButtonText: 'Tetap Di Sini'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'logout.php';
                }
            })
        }

        // Cek parameter sukses terhapus dari URL redirection
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('terhapus') === 'true') {
            Swal.fire({
                title: 'Terhapus!',
                text: 'Record informasi keluarga berhasil dieliminasi.',
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
            // Bersihkan parameter URL
            window.history.replaceState({}, document.title, "dashboard.php");
        }
    </script>
</body>
</html>