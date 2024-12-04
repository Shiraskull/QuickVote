<?php

namespace App\Livewire;

use App\Models\Voting;
use Livewire\Component;

class ManageVoting extends Component
{
    public function render()
    {

        return view('livewire.manage-voting',[
            'votings' => Voting::all()
        ]);
    }
}
