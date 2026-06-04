<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Bantuan Sosial - Tanpa Kemiskinan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Poppins', 'sans-serif'] },
                    colors: {
                        bansos: {
                            dark: '#0f172a',
                            blue: '#0d6efd',
                            light: '#f8fafc'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-bansos-light font-sans text-slate-800">

    <nav class="bg-slate-900/95 backdrop-blur-md text-white shadow-xl px-4 py-4 sticky top-0 z-50 border-b border-slate-800 animate__animated animate__fadeInDown">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <span class="font-bold tracking-wider text-sm md:text-base uppercase flex items-center gap-2">
                <span>🛡️</span> Portal Sinergi Bansos
            </span>
            <div class="flex items-center gap-6 text-xs md:text-sm font-medium">
                <a href="#beranda" class="hover:text-blue-400 transition-colors">Beranda</a>
                <a href="#realitas" class="hover:text-blue-400 transition-colors">Urgensi</a>
                <a href="#program" class="hover:text-blue-400 transition-colors">Program Plan</a>
                <a href="#alur" class="hover:text-blue-400 transition-colors">Alur Sistem</a>
                <a href="login.php" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 font-semibold rounded-xl text-xs transition-all shadow-md shadow-blue-600/20">Login Admin</a>
            </div>
        </div>
    </nav>

    <section id="beranda" class="relative bg-gradient-to-br from-bansos-dark via-slate-900 to-slate-850 text-white min-h-[85vh] flex items-center px-4 overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(13,110,253,0.15),transparent_50%)] pointer-events-none"></div>
        <div class="max-w-4xl mx-auto text-center relative z-10 py-16 animate__animated animate__fadeInUp">
            <span class="bg-blue-500/10 text-blue-400 border border-blue-500/20 text-xs font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-sm">
                SDG Target 1: Tanpa Kemiskinan
            </span>
            <h1 class="font-bold text-4xl md:text-6xl mt-6 mb-6 leading-tight tracking-tight">
                Integrasi Data Tepat Sasaran Untuk <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Pengentasan Kemiskinan</span>
            </h1>
            <p class="text-slate-400 text-sm md:text-lg max-w-2xl mx-auto mb-10 leading-relaxed">
                Menyelaraskan manajemen data kependudukan berbasis indikator riil. Melalui platform ini, validasi kondisi rumah tangga diproses secara objektif demi mendukung efektivitas program bantuan penunjang ekonomi.
            </p>
            <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                <a href="#program" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-8 py-3.5 rounded-2xl shadow-lg shadow-blue-600/30 transition-all w-full sm:w-auto text-center">
                    Lihat 4 Pilar Program Plan
                </a>
                <a href="login.php" class="bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-sm px-8 py-3.5 rounded-2xl border border-slate-700 transition-all w-full sm:w-auto text-center">
                    Masuk Panel Petugas
                </a>
            </div>
        </div>
    </section>

    <section id="realitas" class="max-w-6xl w-full mx-auto px-4 py-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Urgensi & Validasi Lapangan</h2>
            <p class="text-slate-500 text-sm md:text-base mt-2 max-w-lg mx-auto">Mengapa klasifikasi data kependudukan menjadi kunci penting dalam memutus rantai pra-sejahtera?</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-xl shadow-slate-200/50 text-center transform hover:-translate-y-1 transition-all duration-300">
                <div class="text-5xl font-extrabold text-rose-600 mb-2">9.03%</div>
                <h4 class="font-semibold text-slate-800 mb-2">Akurasi Status Miskin</h4>
                <p class="text-slate-500 text-xs leading-relaxed">Penyaringan ketat indikator keluarga untuk memastikan alokasi dana intervensi jatuh ke tangan yang benar-benar membutuhkan.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-xl shadow-slate-200/50 text-center transform hover:-translate-y-1 transition-all duration-300">
                <div class="text-5xl font-extrabold text-amber-500 mb-2">Faktor Fisik</div>
                <h4 class="font-semibold text-slate-800 mb-2">Analisis Kondisi Rumah</h4>
                <p class="text-slate-500 text-xs leading-relaxed">Kelayakan parameter hunian (sanitasi, atap, lantai) dijadikan tolok ukur utama pengesahan klaster penerima manfaat.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-xl shadow-slate-200/50 text-center transform hover:-translate-y-1 transition-all duration-300">
                <div class="text-5xl font-extrabold text-blue-600 mb-2">Real-Time</div>
                <h4 class="font-semibold text-slate-800 mb-2">Sinkronisasi Database</h4>
                <p class="text-slate-500 text-xs leading-relaxed">Sistem administrasi dirancang responsif guna menghindari tumpang tindih data kependudukan di tingkat kelurahan.</p>
            </div>
        </div>
    </section>

    <section id="program" class="bg-slate-900 text-white py-20 px-4">
        <div class="max-w-6xl w-full mx-auto">
            <div class="text-center mb-16">
                <span class="text-xs font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 rounded-full px-3 py-1 uppercase tracking-widest">Sinergi Aksi SDG Target 1</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-4 tracking-tight">4 Pilar Rencana Program Pembangunan</h2>
                <p class="text-slate-400 text-sm max-w-md mx-auto mt-2">Daftar klasifikasi solusi jangka pendek dan jangka panjang yang didukung oleh data validasi sistem.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-slate-800/50 border border-slate-700/50 p-8 rounded-2xl flex gap-5 items-start">
                    <div class="bg-blue-600 text-white p-4 rounded-xl text-xl font-bold shadow-md shadow-blue-500/10">🍱</div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-white">Bantuan Sosial (Bansos) Sembako</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">Pemberian jaminan kebutuhan pokok pangan bagi keluarga penerima manfaat yang terdata masuk ke dalam kriteria miskin dan memiliki kondisi rumah tangga rentan.</p>
                    </div>
                </div>
                <div class="bg-slate-800/50 border border-slate-700/50 p-8 rounded-2xl flex gap-5 items-start">
                    <div class="bg-emerald-600 text-white p-4 rounded-xl text-xl font-bold shadow-md shadow-emerald-500/10">📈</div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-white">Pemberdayaan UMKM (Modal Usaha)</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">Penyaluran stimulus finansial dan alokasi modal kerja terarah bagi masyarakat pra-sejahtera produktif agar mampu merintis kemandirian ekonomi skala mikro.</p>
                    </div>
                </div>
                <div class="bg-slate-800/50 border border-slate-700/50 p-8 rounded-2xl flex gap-5 items-start">
                    <div class="bg-amber-500 text-white p-4 rounded-xl text-xl font-bold shadow-md shadow-amber-500/10">🛠️</div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-white">Bursa Lowongan Kerja</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">Fasilitas pemetaan lapangan pekerjaan inklusif untuk mempertemukan angkatan kerja potensial dari basis data keluarga rentan dengan sektor industri penyerap tenaga kerja.</p>
                    </div>
                </div>
                <div class="bg-slate-800/50 border border-slate-700/50 p-8 rounded-2xl flex gap-5 items-start">
                    <div class="bg-indigo-600 text-white p-4 rounded-xl text-xl font-bold shadow-md shadow-indigo-500/10">🎓</div>
                    <div>
                        <h3 class="font-bold text-lg mb-2 text-white">Edukasi & Literasi Keuangan</h3>
                        <p class="text-slate-400 text-sm leading-relaxed">Program bimbingan tata kelola finansial mendasar guna memberikan pemahaman perencanaan keuangan agar aset modal tidak habis terpakai untuk konsumsi harian.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="alur" class="max-w-5xl w-full mx-auto px-4 py-20">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900 tracking-tight">Mekanisme Validasi Sistem</h2>
            <p class="text-slate-500 text-sm mt-2">Bagaimana data entri diproses hingga diwujudkan ke dalam aksi pertolongan program sosial.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 font-bold rounded-full flex items-center justify-center mx-auto text-lg border border-blue-200 shadow-sm">1</div>
                <h4 class="font-bold text-base mt-4 mb-2 text-slate-900">Pengumpulan Berkas</h4>
                <p class="text-slate-500 text-xs px-4">Warga menyerahkan data kependudukan berupa Nomor Kartu Keluarga (KK) ke sekretariat kelurahan.</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 font-bold rounded-full flex items-center justify-center mx-auto text-lg border border-blue-200 shadow-sm">2</div>
                <h4 class="font-bold text-base mt-4 mb-2 text-slate-900">Entri Sistem Admin</h4>
                <p class="text-slate-500 text-xs px-4">Petugas menginput data secara online, menilai kelayakan hunian serta status indikator ekonomi keluarga.</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 font-bold rounded-full flex items-center justify-center mx-auto text-lg border border-blue-200 shadow-sm">3</div>
                <h4 class="font-bold text-base mt-4 mb-2 text-slate-900">Klasifikasi Objektif</h4>
                <p class="text-slate-500 text-xs px-4">Database memetakan kondisi riil warga ke dalam klaster penerima prioritas tinggi guna meminimalkan margin kesalahan target.</p>
            </div>
            <div class="text-center">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 font-bold rounded-full flex items-center justify-center mx-auto text-lg border border-emerald-200 shadow-sm">4</div>
                <h4 class="font-bold text-base mt-4 mb-2 text-emerald-900">Aksi Penyelamatan</h4>
                <p class="text-slate-500 text-xs px-4">Penyaluran komoditas pangan pokok, pengalokasian modal usaha, serta informasi bursa kerja didistribusikan berkala.</p>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-500 text-center py-6 text-xs border-t border-slate-800">
        <div class="max-w-6xl w-full mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="mb-0 text-slate-400">&copy; 2026 <span class="text-white font-medium">Sistem Informasi Penanggulangan Kemiskinan</span>. Kelompok 5.</p>
            <div class="flex gap-4 text-slate-400">
                <a href="#beranda" class="hover:text-white transition-colors">Top Halaman ↑</a>
            </div>
        </div>
    </footer>

</body>
</html>