<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'tanggal',
        'nominal',
        'keterangan',
        'bukti_transfer',
        'status_transaksi',
    ];

    /**
     * Get the user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category that owns the transaction.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
