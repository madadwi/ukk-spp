<?php

namespace App\Models;

use App\Models\Petugas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use
        HasFactory,
        HasUuids;
    protected $guarded = ['id'];
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }
}
