<?php

namespace App\Livewire;

use App\Models\Options;
use App\Models\Voting;
use Livewire\WithFileUploads;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateVoting extends Component
{
    use WithFileUploads;
    public $title;
    public $description;
    public $start_date;
    public $end_date;
    public $options = [];
    public $images = [];

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
        $this->images[] = null; // Tambahkan slot kosong untuk gambar
    }

    // Menghapus opsi
    public function removeOption($index)
    {
        // dd($index);
        unset($this->options[$index]);
        unset($this->images[$index]);

        $this->options = array_values($this->options); // Reindex array
        $this->images = array_values($this->images); // Reset indeks array
    }
    public function removePhoto($index)
    {
        $this->images[$index] = null;
    }

    // Menyimpan voting dan opsi
    public function saveVoting()
    {
        $hasImage = collect($this->images)->filter()->isNotEmpty();
        if ($hasImage && in_array(null, $this->images, true)) {
            $this->addError('images', 'Semua opsi harus memiliki gambar jika salah satu opsi memiliki gambar.');
            return;
        }

        // Lakukan penyimpanan data (logika tergantung kebutuhan)
        // dd($this->options, $this->images);

        // Membuat voting baru
        $voting = Voting::create([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'total_votes' => 0,
            'created_by' => Auth::user()->id,
        ]);

        // Menyimpan pilihan untuk voting
        foreach ($this->options as $index => $optionText) {
            $optionData = [
                'voting_id' => $voting->id,
                'option_name' => $optionText,
            ];
            if ($this->images[$index]) {
                $optionData['image'] = $this->images[$index]->store('voting_options', 'public');
            }
            Options::create($optionData);
        }

        session()->flash('message', 'Voting berhasil dibuat!');
        $this->reset(); // Reset form setelah berhasil
        session()->flash('modal', [
            'title' => 'Sukses Membuat Voting',
            'message' => 'Voting berhasil dibuat!',
        ]);

        return redirect()->route('manage-voting');
    }
    public function render()
    {
        return view('livewire.create-voting');
    }
}
