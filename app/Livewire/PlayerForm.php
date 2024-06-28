<?php

namespace App\Livewire;

use App\Models\KaraokeQueue;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PlayerForm extends Component
{

    public $currentSession = null;

    public $nowPlaying = null;

    public $queues = [];

    public $showSearch = false;

    public $showToast = false;

    protected $listeners = ['closeSearchModal' => 'closeModal','videoEnded' => 'videoDone'];

    public $videoId = null;
    public function mount(){
        $this->currentSession = app('currentSession');

        $this->nowPlaying = $this->currentSession->karaokeQueues()->where('is_done',0)->orderBy('ordinal','asc')->first();
        $queueId =  $this->nowPlaying->id ?? null;
        $queuesQuery = $this->currentSession->karaokeQueues()->where('is_done',0)->orderBy('ordinal','asc');

        if($this->nowPlaying){
            $queuesQuery->where('id','<>',$this->nowPlaying->id);

            $this->nowPlaying = json_decode($this->nowPlaying->youtube_data,true);
            $this->nowPlaying['id'] = $queueId;
            $this->videoId  = $this->nowPlaying['videoId'];
        }

        $this->queues = $queuesQuery->get();

    }

    public function render()
    {

        return view('livewire.player-form',[
            'qrCode' => QrCode::size(200)->generate(config('app.url').'/mobile/'.$this->currentSession->id.'/'.$this->currentSession->hash),
            'queues' => $this->queues,
            'videoId' => $this->videoId
        ]);
    }

    public function closeModal()
    {
        $this->showSearch = false;
        $this->showToast = true;
    }

    public function videoDone()
    {
        $karaokeQueue = KaraokeQueue::find($this->nowPlaying['id']);
        $karaokeQueue->is_done = 1;
        $karaokeQueue->save();

        return redirect()->route('player',[
            'id' => $this->currentSession->id,
            'hash' => $this->currentSession->hash
        ]);
    }
}
