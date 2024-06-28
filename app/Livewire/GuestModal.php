<?php

namespace App\Livewire;

use App\Models\Guest;
use App\Models\KaraokeQueue;
use App\Models\KaraokeSession;
use Livewire\Component;

class GuestModal extends Component
{
    public $name;
    public $isOpen = false;
    public $hash;
    public $currentSession = null;
    public $showToast = false;

    protected $rules = [
        'name' => 'required|min:3',
    ];

    protected $listeners = ['showToast' => 'showToastMessage'];

    public function mount($hash)
    {
        if (!isset($_COOKIE['guestId'])) {
            $this->isOpen = true;
        }

        $this->hash = $hash;

        $this->currentSession = KaraokeSession::where('hash',$hash)->first();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function saveGuest()
    {
        $this->validate();

        $guest = Guest::create([
            'fullname' => $this->name,
            'karaoke_session_id' => $this->currentSession->id
        ]);

        $this->dispatch('store-name', [
            'guestId' => $guest->id,
            'fullname' => $this->name,
            'karaoke_session_id' => $this->currentSession->id
        ]);

        $this->closeModal();
    }

    public function showToastMessage(){
        $this->showToast = true;
    }

    public function render()
    {
        return view('livewire.guest-modal');
    }
}
