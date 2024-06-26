<?php

namespace App\Livewire;

use Alaouy\Youtube\Facades\Youtube;
use Livewire\Component;

class SearchSongs extends Component
{
    public $searchYoutubeTerm = '';
    public $songs = [];

    public function mount(){
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

    public function addToQueue($videoId){
        $video = Youtube::getVideoInfo($videoId);

        dd($video);

        /**
         * DETAILS NEEDED FROM YOUTUBE JSON API
         *
         *
         * title,
         * thumbnails > default  >url
         *
         */
    }

}
