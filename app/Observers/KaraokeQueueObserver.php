<?php

namespace App\Observers;

use App\Models\KaraokeQueue;
use Illuminate\Support\Facades\Log;

class KaraokeQueueObserver
{
    /**
     * Handle the KaraokeQueue "created" event.
     */
    public function created(KaraokeQueue $karaokeQueue): void
    {

        $maxOrdinal = KaraokeQueue::where('karaoke_session_id', $karaokeQueue->karaoke_session_id)->max('ordinal');
        $karaokeQueue->ordinal = $maxOrdinal ? $maxOrdinal + 1 : 1;

        // Save the updated model
        $karaokeQueue->save();
    }

    /**
     * Handle the KaraokeQueue "updated" event.
     */
    public function updated(KaraokeQueue $karaokeQueue): void
    {
        //
    }

    /**
     * Handle the KaraokeQueue "deleted" event.
     */
    public function deleted(KaraokeQueue $karaokeQueue): void
    {
        //
    }

    /**
     * Handle the KaraokeQueue "restored" event.
     */
    public function restored(KaraokeQueue $karaokeQueue): void
    {
        //
    }

    /**
     * Handle the KaraokeQueue "force deleted" event.
     */
    public function forceDeleted(KaraokeQueue $karaokeQueue): void
    {
        //
    }
}
