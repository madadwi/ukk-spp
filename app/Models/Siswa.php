<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use
        HasFactory,
        HasUuids;
    protected $guarded = ['id'];

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class);
    }
    public function spp(): BelongsTo
    {
        return $this->belongsTo(Spp::class);
    }
    public function pembayarans(): HasMany
    {
        return $this->hasMany(Pembayaran::class);
    }
}
