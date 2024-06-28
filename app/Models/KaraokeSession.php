<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaraokeSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hash'
    ];


    public function scopeCurrentDay($query){
        $today = Carbon::today();
        return $query->whereDate('created_at',$today);
    }

    public function isActive(){
        return $this->created_at->toDateString() == Carbon::now()->toDateString();
    }


    public function karaokeQueues()
    {
        return $this->hasMany(KaraokeQueue::class, 'karaoke_session_id');
    }
}
