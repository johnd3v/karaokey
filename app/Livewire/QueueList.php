<?php

namespace App\Livewire;

use Livewire\Component;

class QueueList extends Component
{
    public $queues = [];
    public $currentSession = null;

    protected $listeners = ['queueUpdated' => 'refreshQueue'];

    public function mount()
    {
        $this->currentSession = app('currentSession');
        $this->refreshQueue();

    }

    public function refreshQueue()
    {
        $this->queues =  $this->currentSession->karaokeQueues()->where('is_done', 0)->orderBy('ordinal', 'asc')->get()->toArray();
    }


    public function render()
    {
        return view('livewire.queue-list');
    }
}
