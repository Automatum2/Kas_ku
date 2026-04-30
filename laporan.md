# PROPOSAL PROYEK WEB DENGAN LARAVEL (KELOMPOK 11)

## “Sistem Transparansi Kas-Ku”

## DAFTAR ISI
1. [BAB 1 PENDAHULUAN](#bab-1-pendahuluan)
2. [BAB 2 KAJIAN TEORI](#bab-2-kajian-teori)
3. [BAB 3 IMPLEMENTASI SISTEM](#bab-3-implementasi-sistem)

---

## BAB 1 PENDAHULUAN

### 1.1 Latar Belakang
Di lingkungan Sekolah Menengah Kejuruan (SMK), pengelolaan uang kas kelas sangat esensial untuk menunjang kebutuhan operasional mandiri dan kegiatan sosial siswa. Namun, praktik pencatatan manual menggunakan buku tulis oleh bendahara kerap menimbulkan kendala administratif, mulai dari risiko dokumen fisik rusak atau hilang, rentannya kesalahan hitung (*human error*), hingga lambatnya rekapitulasi data. Lebih jauh, metode konvensional ini menciptakan celah transparansi karena anggota kelas tidak memiliki akses langsung untuk melihat saldo akhir maupun rincian pengeluaran.

Merespons permasalahan tersebut, diperlukan sebuah transisi menuju pengelolaan keuangan digital yang terpusat dan akuntabel. Oleh karena itu, kami mengajukan proyek pengembangan **"Kas-Ku: Sistem Informasi Transparansi Uang Kas dan Pendanaan Kelas Berbasis Web"**. Sistem ini dirancang khusus untuk mendigitalisasi fungsi buku kas fisik secara komprehensif, memfasilitasi bendahara dalam menginput data transaksi secara otomatis, serta membangun tingkat kepercayaan seluruh siswa.

### 1.2 Rumusan Masalah
1. Bagaimana merancang dan membangun sistem informasi "Kas-Ku" berbasis web untuk mendigitalisasi pengelolaan uang kas kelas secara efisien?
2. Bagaimana membangun logika sistem yang dapat menghitung dan mendeteksi sisa tunggakan iuran kas siswa secara otomatis?
3. Bagaimana memfasilitasi bendahara kelas dalam merekapitulasi data dan menghasilkan laporan keuangan digital yang akurat?
4. Bagaimana meningkatkan transparansi dan akuntabilitas pengelolaan dana melalui sistem hak akses?

### 1.3 Tujuan Proyek
1. Menghasilkan perangkat lunak aplikasi "Kas-Ku" berbasis web yang mampu menggantikan pencatatan buku kas kelas manual.
2. Mengimplementasikan fitur perhitungan otomatis (*auto-calculate*) untuk pelacakan status pembayaran secara *real-time*.
3. Menyediakan fitur rekapitulasi terpusat untuk mempermudah bendahara dalam mencetak laporan arus kas.
4. Mewujudkan ekosistem pengelolaan dana yang transparan bagi seluruh siswa.

---

## BAB 2 KAJIAN TEORI

### 2.1 Konsep Dasar Sistem Informasi
Sistem informasi adalah entitas terpadu yang terdiri dari komponen perangkat keras, perangkat lunak, manusia (*brainware*), dan prosedur yang bekerja sama untuk memproses data menjadi informasi yang bermakna.

### 2.2 Pengelolaan Kas dan Buku Kas
Kas merupakan aset likuid yang digunakan dalam transaksi operasional. Digitalisasi buku kas diperlukan untuk memastikan data historis transaksi terekam secara permanen, terstruktur, dan mudah direkapitulasi.

### 2.3 Konsep Transparansi dan Akuntabilitas
*   **Transparansi:** Menjamin akses bagi semua pihak berkepentingan untuk memperoleh informasi pengelolaan anggaran.
*   **Akuntabilitas:** Kewajiban pengelola dana untuk mempertanggungjawabkan pengendalian sumber daya yang diamanatkan.

### 2.4 Aplikasi Berbasis Web (Web-Based Application)
Aplikasi yang dapat diakses melalui browser dengan model *client-server*. Keunggulan utamanya adalah kemudahan akses lintas platform tanpa perlu instalasi di perangkat pengguna.

### 2.5 Teknologi Pengembangan Sistem (Laravel Stack)
*   **Frontend:** HTML5, CSS3, dan JavaScript. Untuk tampilan yang modern, digunakan engine **Blade Template** dan framework CSS (seperti Tailwind atau Bootstrap).
*   **Backend (Laravel):** Framework PHP yang menggunakan pola arsitektur **MVC (Model-View-Controller)**. Laravel menyediakan fitur keamanan bawaan, manajemen basis data melalui Eloquent ORM, dan sistem routing yang efisien.
*   **Database:** Menggunakan basis data relasional (seperti **MySQL**) untuk menyimpan data user, kategori transaksi, dan riwayat arus kas.

---

## BAB 3 IMPLEMENTASI SISTEM

### 3.1 Flowchart (Alur Kerja Sistem)
*   **Siswa:** Login → Dashboard → Lihat Laporan & Status Tunggakan.
*   **Bendahara:** Login → Kelola Data Siswa → Input Transaksi (Masuk/Keluar) → Generate Laporan.

### 3.2 Entity Relationship Diagram (ERD)
*   **users:** id_user, nis, nama_lengkap, password, role ('Siswa', 'Bendahara').
*   **kategori_transaksi:** id_kategori, nama_kategori, jenis ('Pemasukan', 'Pengeluaran').
*   **transaksi:** id_transaksi, id_user, id_kategori, tanggal, nominal, keterangan, bukti_transfer, status.
*   **log_aktivitas:** id_log, id_user, aksi, waktu.

### 3.3 Pembagian Peran Kelompok
1.  **Fullstack Developer (Project Leader):** Integrasi Laravel, Konfigurasi Database & Routing.
2.  **Frontend Developer:** Menyusun UI menggunakan Blade & CSS, memastikan responsivitas.
3.  **Backend Developer:** Logika Controller, Validasi Form, dan Autentikasi.
4.  **UI/UX Designer & Documenter:** Desain mockup, penyusunan dokumentasi dan laporan.
