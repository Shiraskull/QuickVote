<?php

namespace App\Livewire;

use App\Models\Voting;
use Livewire\Component;

class DetailVoting extends Component
{
    public $voting;
    public function mount($slug){
        $this->voting = Voting::where('id', $slug)->first();
        // dd($this->voting);
    }
    public function render()
    {
        return view('livewire.detail-voting');
    }
}
