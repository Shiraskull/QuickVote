<?php

namespace App\Livewire;

use App\Models\Options;
use App\Models\Voting;
use Livewire\Component;

class CreateVoting extends Component
{
    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $options = [];

    // Validasi form
    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
        'start_date' => 'required|date|after_or_equal:today',
        'end_date' => 'required|date|after:start_date',
        'options' => 'required|array|min:1',
        'options.*' => 'required|string|max:255',
    ];

    // Menambahkan opsi baru
    public function addOption()
    {
        $this->options[] = '';
    }

    // Menghapus opsi
    public function removeOption($index)
    {
        // dd($index);
        unset($this->options[$index]);
        $this->options = array_values($this->options); // Reindex array
    }

    // Menyimpan voting dan opsi
    public function saveVoting()
    {
        $this->validate();

        // Membuat voting baru
        $voting = Voting::create([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'total_votes' => 0,
            'created_by' => 1,
        ]);

        // Menyimpan pilihan untuk voting
        foreach ($this->options as $optionText) {
            Options::create([
                'voting_id' => $voting->id,
                'option_name' => $optionText,
            ]);
        }

        session()->flash('message', 'Voting berhasil dibuat!');
        $this->reset(); // Reset form setelah berhasil
    }
    public function render()
    {
        return view('livewire.create-voting');
    }
}
