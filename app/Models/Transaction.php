<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'nama',
        'category_id',
        'tanggal',
        'jumlah',
        'catatan',
        'gambar',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
}
