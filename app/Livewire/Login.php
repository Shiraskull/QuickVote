<?php

namespace App\Livewire;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $type = 'password';
    public $remember = false;
    public $loadingLogin = false; // Tambahkan variabel ini

    // protected $rules = [
    //     'email' => 'required|email',
    //     'password' => 'required',
    // ];

    public function test(){
        // dd();
    }
    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $this->loadingLogin = true; // Set loadingLogin menjadi true saat proses login dimulai
        sleep(5);
        // try {
        //     //code...
        //     $this->validate();
        // } catch (\Throwable $th) {
        //     $this->loadingLogin = false;
        // }


        // Cek apakah email ada di database
        $user = \App\Models\User::where('email', $this->email)->first();

        if (!$user) {
            $this->addError('email', 'Email tidak terdaftar.');
            $this->loadingLogin = false; // Set loadingLogin kembali menjadi false
            return;
        }

        // Cek apakah password benar
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('password', 'Password salah.');
            $this->loadingLogin = false; // Set loadingLogin kembali menjadi false
            return;
        }

        // Login berhasil
        session()->regenerate();
        Notification::make()
            ->title('Login berhasil')
            ->success()
            ->send();
        return redirect()->intended('/');
    }

    public function togglePassword()
    {
        // dd('sss');
        if ($this->type === 'password') {
            $this->type = 'text';
        } else {
            $this->type = 'password';
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
