<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\Component;

class Profile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $photo;
    public $user;
    public $showForm = false;

    public function mount()
    {
        // Mengambil data user jika sudah login
        $this->user = Auth::user();
        if (Auth::check()) {
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            $this->photo = $this->user->image;
        } else {
            $this->name = '';
            $this->email = '';
            $this->password = '';
        }
    }
    public function save()
    {
        // dd($this->name, $this->email, $this->password);

        // Menyimpan foto jika ada
        if ($this->photo) {
            $this->user->image = $this->photo->store('profile_photos', 'public');
            $this->user->save();
        }

        // Simpan data lainnya jika diperlukan
        $this->user->name = $this->name;
        $this->user->email = $this->email;

        // Update password hanya jika ada perubahan
        if (!empty($this->password)) {
            $this->user->password = bcrypt($this->password); // Hash password
        }

        $this->user->save();
        $this->showForm = false;
    }

    public function removePhoto()
    {
        $this->photo = null; // Menghapus foto yang sedang di-upload
    }

    public function logout(){
        Auth::logout();
        // dd('logout');
        session()->flash('modal', [
            'title' => 'Berhasil Logout',
            'message' => 'Sampai Jumpa Lagi!',
        ]);
        return redirect()->route('home');
    }

    public function editProfile(){
        $this->showForm = true;
    }
    public function closeProfile(){
        $this->showForm = false;
    }
    public function render()
    {
        return view('livewire.profile',[
        ]);
    }
}
