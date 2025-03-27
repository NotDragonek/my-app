<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuchController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function process_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->userModel->login($username, $password);

        if ($user) {
            session()->set('user_id', $user['id']);
            session()->set('username', $user['username']);
            session()->set('isLogged', true);
            session()->set('rola', $user['rola']);
            dd(session()->get());
            return redirect()->to('/');
        }

        return redirect()->to('/auth/login')->with('error', 'Błędne dane logowania.');
    }

    public function process_register()
    {
        // Walidacja
        if (!$this->validate([
            'username' => 'required|min_length[3]',
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'rola'     => 'required|in_list[user,seller,admin]',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Błąd w formularzu rejestracyjnym.');
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'rola'     => $this->request->getPost('rola'),
            'imie'     => $this->request->getPost('imie'),
            'nazwisko' => $this->request->getPost('nazwisko'),
            'adres'    => $this->request->getPost('adres'),
        ];

        if ($this->userModel->insert($data)) {
            return redirect()->to('/auth/login')->with('success', 'Rejestracja zakończona sukcesem.');
        }

        return redirect()->to('/auth/register')->with('error', 'Błąd podczas rejestracji.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
