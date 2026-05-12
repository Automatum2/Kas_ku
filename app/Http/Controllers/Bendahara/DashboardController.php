<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung Total Saldo (Pemasukan - Pengeluaran) yang berstatus Lunas
        $totalPemasukan = Transaction::whereHas('category', function($q) {
            $q->where('jenis', 'Pemasukan');
        })->where('status_transaksi', 'Lunas')->sum('nominal');

        $totalPengeluaran = Transaction::whereHas('category', function($q) {
            $q->where('jenis', 'Pengeluaran');
        })->where('status_transaksi', 'Lunas')->sum('nominal');

        $saldoAkhir = $totalPemasukan - $totalPengeluaran;

        $recentTransactions = Transaction::with(['user', 'category'])
            ->orderBy('tanggal', 'desc')
            ->limit(5)
            ->get();

        // Ambil Transaksi yang Menunggu Konfirmasi
        $pendingTransactions = Transaction::with(['user', 'category'])
            ->where('status_transaksi', 'Menunggu')
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('bendahara.dashboard', compact('saldoAkhir', 'totalPemasukan', 'totalPengeluaran', 'recentTransactions', 'pendingTransactions'));
    }

    public function terima($id)
    {
        $transaksi = Transaction::findOrFail($id);
        $transaksi->update(['status_transaksi' => 'Lunas']);

        return redirect()->back()->with('success', 'Pembayaran kas berhasil diverifikasi dan diterima.');
    }

    public function tolak($id)
    {
        $transaksi = Transaction::findOrFail($id);
        $transaksi->update(['status_transaksi' => 'Ditolak']);

        return redirect()->back()->with('success', 'Pembayaran kas telah ditolak.');
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
            'user_id' => auth()->id(),
            'category_id' => $kategori->id,
            'tanggal' => now(),
            'nominal' => 10000,
            'keterangan' => 'Pembayaran Kas via Simulasi QRIS',
            'bukti_transfer' => $nama_file,
            'status_transaksi' => 'Menunggu'
        ]);

        return redirect()->back()->with('success', 'Bukti pembayaran Anda berhasil dikirim, Anda dapat menyetujuinya sendiri di kolom persetujuan.');
    }

    public function tentang()
    {
        return view('bendahara.tentang');
    }
}
