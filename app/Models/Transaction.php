<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'nama',
        'category_id',
        'date',
        'jumlah',
        'catatan',
        'gambar',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function scopeExpenses($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->where('pengeluaran', true);
        });
    }
    public function scopeIncomes($query)
    {
        return $query->whereHas('category', function ($query) {
            $query->where('pengeluaran', false);
        });
    }
}
