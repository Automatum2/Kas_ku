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

        // Ambil 5 Transaksi Terakhir
        $recentTransactions = Transaction::with(['user', 'category'])
            ->orderBy('tanggal', 'desc')
            ->limit(5)
            ->get();

        return view('bendahara.dashboard', compact('saldoAkhir', 'totalPemasukan', 'totalPengeluaran', 'recentTransactions'));
    }
}
