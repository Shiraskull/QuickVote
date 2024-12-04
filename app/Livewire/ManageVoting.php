<?php

namespace App\Livewire;

use App\Models\Voting;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ManageVoting extends Component
{
    public function createVoting(){

        if (Auth::check()) {
            return redirect()->route('voting-create');
        }
        session()->flash('modal', [
            'title' => 'Login Diperlukan!',
            'message' => 'Anda harus login terlebih dahulu untuk membuat Voting!',
        ]);
        return redirect()->route('manage-voting');
    }
    public function render()
    {
        $data = [];

        if (Auth::check()) {
            $data = Voting::where('created_by', Auth::user()->id)->get();
        }
        return view('livewire.manage-voting',[
            'votings' =>$data
        ]);
    }
}
