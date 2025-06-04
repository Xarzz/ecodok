<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokumentasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'jadwal_id', 'file_path', 'keterangan',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(JadwalKegiatan::class, 'jadwal_id');
    }
}
