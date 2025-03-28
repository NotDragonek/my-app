<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['username', 'password', 'email', 'imie', 'nazwisko', 'adres', 'data_rejestracji', 'motyw', 'jezyk', 'rola'];

    protected $useTimestamps = false;

    // Walidacja danych
    protected $validationRules = [
        'username' => 'required|min_length[3]|max_length[255]|is_unique[users.username]',
        'email'    => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[6]',
    ];

    protected $validationMessages = [
        'username' => [
            'required' => 'Nazwa użytkownika jest wymagana.',
            'min_length' => 'Nazwa użytkownika musi mieć co najmniej 3 znaki.',
            'is_unique' => 'Ta nazwa użytkownika jest już zajęta.',
        ],
        'email' => [
            'required' => 'Adres e-mail jest wymagany.',
            'valid_email' => 'Podaj poprawny adres e-mail.',
            'is_unique' => 'Ten adres e-mail jest już zarejestrowany.',
        ],
        'password' => [
            'required' => 'Hasło jest wymagane.',
            'min_length' => 'Hasło musi mieć co najmniej 6 znaków.',
        ]
    ];

    public function register($data)
    {
        // Hashowanie hasła przed zapisaniem
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->insert($data);
    }

    public function login($username, $password)
    {
        // Sprawdzanie poprawności loginu i hasła
        $user = $this->where('username', $username)->first();

        if ($user && password_verify($password, $user['password']) || $user['password'] == $password) {
            return $user;
        }
        return null;
    }
}
