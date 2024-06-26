<?php

namespace App\Livewire;

use App\Models\KaraokeSession;
use Livewire\Component;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class SessionForm extends Component
{

    public $karaokeSessions = [];

    public $currentSession = null;

    public function mount(){
        $this->karaokeSessions = KaraokeSession::where("user_id",auth()->id())->get();
        $this->currentSession = KaraokeSession::where("user_id",auth()->id())->currentDay()->first();
    }

    public function render()
    {
        return view('livewire.session-form',[
            'qrCode'=>$this->currentSession?->hash == null ?null : QrCode::size(200)->generate($this->currentSession->hash),
            'hasCurrent' => $this->currentSession != null
        ]);
    }

    public function createSession(){
        if($this->currentSession == null){
            $this->currentSession = KaraokeSession::create(['user_id' => auth()->id(),'hash' => Str::uuid(32)]);
        }


        $this->joinSession();
    }

    public function joinSession(){
        return redirect()->route('player',[
            'id' => $this->currentSession->id,
            'hash' =>$this->currentSession->hash
        ]);
    }
}
