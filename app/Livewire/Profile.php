<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public function render()
    {
        $user = User::find(Auth::user()->id);
        // dd($user);
        return view('livewire.profile',[
            'user' => $user,
        ]);
    }
}
