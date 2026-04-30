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

        return view('siswa.dashboard', compact('saldoKelas', 'myTransactions'));
    }
}
