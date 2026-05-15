# Dokumentasi Perencanaan UI/UX Kas Ku

Dokumen ini berisi pembahasan, fungsi, opini, dan alur untuk setiap frame desain sistem transparansi Kas Ku.

---

## Frame 13: Login Page
*   **Sistem Login**: Hanya membutuhkan NIS dan NISN.
*   **Database**: Diperlukan database untuk menyimpan data siswa yang sudah login.
*   **Role Bendahara**: Akun Bendahara akan dibuat khusus di tabel database. Saat login, sistem secara otomatis mengenali role tersebut tanpa perlu opsi pilihan role. Bendahara memiliki hak akses khusus untuk mengatur keuangan dan kas.

---

## Frame 14: Dashboard
### Sidebar
*   **Menu**: Home/Dashboard dan Tentang/About.
*   **Logout**: Opsional (di bagian bawah).
*   **Fitur Expanded**: Digunakan untuk membuka/tutup sidebar di samping logo.
*   **Logo**: Berfungsi sebagai shortcut kembali ke Dashboard.

### Dashboard
*   **Ucapan Selamat Datang**: Muncul otomatis setelah login (contoh: menampilkan NIS).
*   **Motto**: Sesuai dengan desain yang ada.
*   **Profil**: Terletak di pojok kanan atas, menunjukkan status sebagai Siswa atau Bendahara. *Catatan: Fitur detail profil saat ini tidak difungsikan untuk menjaga kesederhanaan.*
*   **Menu Utama (3 Cards)**:
    1.  **Card 1 (Mulai Bayar Kas)**: Berisi bio singkat dan tombol "Masuk".
    2.  **Card 2 (Tabungan Kelas)**: Menampilkan judul; klik pada area card untuk masuk ke halaman detail.
    3.  **Card 3 (Lapor)**: Menu untuk melaporkan kendala pembayaran. Ukuran card kecil, hanya judul "Lapor" tanpa bio/tombol.

### History Pembayaran Siswa
*   **Real-time Activity**: Menampilkan siswa yang baru saja membayar (berhasil).
*   **Data yang Ditampilkan**: NIS, deskripsi, tanggal (bulan/tgl/tahun), dan status berhasil.
*   **Lihat Semua History**: Menuju ke halaman Tabungan Kelas (opsional).

---

## Frame 25: Tentang
*   **Isi**: Kata-kata deskriptif dan gambar sesuai desain.
*   **Penting**: Sertakan motto di bawah judul.

---

## Frame 47: Lapor
*   **Fungsi**: Melaporkan gagal bayar, QR error, atau masalah lainnya.
*   **FAQ (Masalah Umum)**:
    *   Menggunakan sistem *accordion* (tanda `∧` dan `∨`).
    *   Klik `∧` untuk menampilkan deskripsi/solusi.
    *   Klik `∨` untuk menutup dan hanya menampilkan judul agar halaman tetap rapi.
*   **Kontak Bendahara**: Menampilkan NIS dan nomor WhatsApp bendahara kelas (contoh: Naila) untuk memudahkan koordinasi manual jika diperlukan.

---

## Frame 26: Mulai Bayar Kas
*   **Akses**: Melalui tombol "Masuk" pada Card 1 di Dashboard.

### Bagian Atas
*   **Kotak Search**: Mencari ID tagihan kas tertentu (berguna jika transaksi sudah banyak).
*   **Rentang Tanggal**: Kalender untuk melihat tagihan berdasarkan bulan. Tanggal yang ditandai oleh bendahara menunjukkan batas waktu pembayaran.

### Bagian Tengah (Tabel Tagihan)
*   **Struktur Tabel**:
    | Date | Deskripsi | Jumlah | Status |
    | :--- | :--- | :--- | :--- |
    | April 12, 2026 | Kas Bulanan | Rp 10.000 | Berhasil! |
    | *ID: 122026* | | | |

*   **ID Tagihan**: Kombinasi tanggal dan tahun sebagai identitas unik.
*   **Pagination**: Disarankan menampilkan 5 list per halaman.

### Bagian Bawah
*   **Download Laporan**: Tombol untuk mengunduh seluruh riwayat tagihan (sudah/belum bayar) dalam format PDF.
*   **Bayar Sekarang**: Tombol untuk menuju halaman transaksi (Frame 27).

---

## Frame 27: Transaksi
### Fitur Navigasi
*   **Tombol Return**: Ikon kembali di samping judul "TRANSAKSI" untuk memudahkan navigasi karena halaman ini tidak ada di menu utama/sidebar.

### Bagian Tengah
*   **Daftar Belum Bayar**: Tabel yang menampilkan tagihan yang belum lunas.
*   **Fitur**: Kotak pencarian ID di dalam tabel.
*   **Tombol Bayar**: Klik tombol merah untuk memunculkan pop-up pembayaran (Frame 44).

### Bagian Bawah
*   **Cara Bayar**: Tombol yang memunculkan pop-up instruksi pembayaran (JANGAN pindah halaman).

---

## Frame 44: QR (Pop-up Transaksi)
*   **Tampilan**: Muncul sebagai modal/pop-up di atas halaman transaksi.
*   **Konten**:
    *   Logo Kas Ku & Judul "Pembayaran melalui QR".
    *   **Metode**: QRIS (DANA, GOPAY, OVO, dll).
    *   **Validitas QR**: Jika expired, bendahara akan mengganti gambar QR secara manual melalui sistem informasi.
    *   **Detail Transaksi**: Menampilkan tanggal, ID Kas, total transaksi, dan total bayar untuk verifikasi.
*   **Pengingat**: Teks instruksi bahwa jika QR error, pembayaran bisa dilakukan via Cash ke bendahara.

---

## Frame 45: Tabungan Kelas
*   **Fungsi**: Menampilkan riwayat seluruh siswa yang sudah membayar (yang sudah di-acc).
*   **Tabel**: Menampilkan NIS siswa, nominal, dan tanggal.
*   **Export PDF**: Tombol minimalis di bawah tabel.
*   **Statistik Tabungan**:
    *   Menampilkan progress goal (Contoh: `Rp 30.000 / 1.000.000`).
    *   Visualisasi bar pengisian.
    *   Teks jumlah total siswa yang sudah membayar.
*   **History Penggunaan**: Tombol untuk melihat detail pengeluaran kas (Frame 48).

---

## Frame 48: Total Uang Kas (Pengeluaran)
*   **Konten**:
    *   Ringkasan pencapaian tabungan di bagian atas.
    *   Tabel rincian barang yang dibeli menggunakan uang kas (keperluan kelas).
    *   Tombol Return kembali ke halaman Tabungan Kelas.

---

## Frame 46: Footer
*   **Konten**: Logo Kas Ku, Contact Us (Nomor telp pengembang), alamat sekolah, teks "Made for XI RPL 2", link media sosial, atau Google Maps sekolah.
*   **Pengecualian**: Footer muncul di semua halaman **KECUALI**:
    1.  Login Page (Frame 13)
    2.  Cara Bayar (Frame 49)
    3.  Bayar QR (Frame 44)

---

## Fitur Khusus Bendahara (Draft)
Rencana fitur tambahan untuk role Bendahara:
1.  **Cetak Laporan PDF**: Fitur khusus untuk mengunduh rekapitulasi.
2.  **Manajemen Tagihan**: Tombol `+` di Frame 26 untuk menambah tagihan kas baru bagi seluruh kelas.
3.  **Sistem Approval (ACC)**:
    *   Bendahara dapat melihat daftar 43 siswa.
    *   Dapat membuka profil per siswa untuk melihat riwayat tagihan mereka.
    *   Tombol centang/ACC untuk memvalidasi pembayaran manual atau verifikasi QR.
    *   *Contoh Alur*: Cari NIS -> Pilih Tagihan (Mei 22) -> Klik [ACC].
4.  **Update QR**: Fitur untuk mengganti gambar QRIS jika sudah tidak valid/expired.