<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaraokeQueue extends Model
{
    use HasFactory;

    protected $fillable = [
        'karaoke_session_id',
        'youtube_data',
        'queued_by',
        'is_done',
        'ordinal'
    ];

    protected $casts = [
        'youtube_data' => 'array'
    ];


    public function karaokeSession()
    {
        return $this->belongsTo(KaraokeSession::class, 'karaoke_session_id');
    }
}
