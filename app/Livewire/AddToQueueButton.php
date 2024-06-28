<?php

namespace App\Livewire;

use Alaouy\Youtube\Facades\Youtube;
use App\Models\KaraokeQueue;
use App\Models\KaraokeSession;
use Livewire\Component;

use function PHPUnit\Framework\isNull;

class AddToQueueButton extends Component
{
    public $ytVideoId;

    public $currentSession;

    public $isGuest;
    public function mount($hash = null){
        if(is_null($hash)){
            $this->currentSession = app('currentSession');
            $this->isGuest = false;
        }else{
            $this->currentSession = KaraokeSession::where('hash',$hash)->first();
            $this->isGuest = true;
        }
    }

    public function render()
    {
        return view('livewire.add-to-queue-button');
    }

    public function addToQueue()
    {
        $videoInfo = Youtube::getVideoInfo($this->ytVideoId);

        if($videoInfo){

            $youtubeData = [
                "videoId" => $videoInfo->id,
                "title" => $videoInfo->snippet->title,
                "thumbnail" => $videoInfo->snippet->thumbnails->default->url
            ];

            $existing = KaraokeQueue::where('karaoke_session_id',$this->currentSession ->id)->where('is_done',0)->count();

            KaraokeQueue::create([
                'karaoke_session_id' => $this->currentSession ->id,
                'youtube_data' => json_encode($youtubeData),
                'is_done' => 0,
                'queued_by' => 'Admin'
            ]);

            $this->doStuffs($existing);
        }
    }

    protected function doStuffs($existing){
        if($this->isGuest){
            $this->dispatch('showToast');
        }else{
            if($existing  == 0){
                return redirect()->route('player',[
                    'id' => $this->currentSession->id,
                    'hash' => $this->currentSession->hash
                ]);
            }else{
                $this->dispatch('closeSearchModal');
                $this->dispatch('queueUpdated');
            }
        }
    }
}
