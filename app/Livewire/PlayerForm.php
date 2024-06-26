<?php

namespace App\Livewire;

use App\Models\KaraokeSession;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PlayerForm extends Component
{

    public $currentSession = null;

    public function mount(){
        $this->currentSession = KaraokeSession::where("user_id",auth()->id())->first();
    }

    public function render()
    {
        return view('livewire.player-form',[
            'qrCode' => QrCode::size(200)->generate($this->currentSession->hash)
        ]);
    }
}
