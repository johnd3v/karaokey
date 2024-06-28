<?php

namespace App\Livewire;

use Alaouy\Youtube\Facades\Youtube;
use Livewire\Component;

class SearchSongs extends Component
{
    public $searchYoutubeTerm = '';
    public $songs = [];
    public $hash = null;
    public function mount($hash = null){
        $this->hash = $hash;
    }

    public function search(){
        $results =   Youtube::searchAdvanced( [
            'part' => 'snippet',
            'maxResults' => 5,
            'q' => $this->searchYoutubeTerm,
            'type' => 'video',
        ],true);

        $this->songs = $results['results'];
    }


    public function render()
    {
        return view('livewire.search-songs');
    }

}
