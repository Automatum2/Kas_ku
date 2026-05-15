<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung Saldo Kelas (untuk transparansi)
        $totalPemasukan = Transaction::whereHas('category', function($q) {
            $q->where('jenis', 'Pemasukan');
        })->where('status_transaksi', 'Lunas')->sum('nominal');

        $totalPengeluaran = Transaction::whereHas('category', function($q) {
            $q->where('jenis', 'Pengeluaran');
        })->where('status_transaksi', 'Lunas')->sum('nominal');

        $saldoKelas = $totalPemasukan - $totalPengeluaran;

        // Riwayat Transaksi Siswa Ini Saja
        $myTransactions = Transaction::with('category')
            ->where('user_id', Auth::id())
            ->orderBy('tanggal', 'desc')
            ->get();

        // Peringkat Siswa Rajin (6 Bulan Terakhir)
        $rankingSiswa = Transaction::where('status_transaksi', 'Lunas')
            ->where('tanggal', '>=', now()->subMonths(6))
            ->selectRaw('user_id, count(*) as total_bayar')
            ->groupBy('user_id')
            ->orderByDesc('total_bayar')
            ->with('user')
            ->take(3)
            ->get();

        return view('siswa.dashboard', compact('saldoKelas', 'myTransactions', 'rankingSiswa'));
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $file = $request->file('bukti_transfer');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move(public_path('uploads/bukti'), $nama_file);

        // Cari atau buat kategori Kas
        $kategori = \App\Models\Category::firstOrCreate(
            ['nama_kategori' => 'Uang Kas'],
            ['jenis' => 'Pemasukan']
        );

        Transaction::create([
            'user_id' => Auth::id(),
            'category_id' => $kategori->id,
            'tanggal' => now(),
            'nominal' => 10000, // Hardcode 10rb untuk demo
            'keterangan' => 'Pembayaran Kas via Simulasi QRIS',
            'bukti_transfer' => $nama_file,
            'status_transaksi' => 'Menunggu'
        ]);

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil dikirim dan menunggu konfirmasi Bendahara.');
    }

    public function tentang()
    {
        return view('siswa.tentang');
    }
}
