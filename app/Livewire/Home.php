<?php

namespace App\Livewire;

use App\Models\Options;
use App\Models\Voting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $votings;

    public function mount(){
        $this->votings = Voting::with('options')->get();
    }
    public function render()
    {

        return view('livewire.home');
    }
}
