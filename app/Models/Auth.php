<?php

use CodeIgniter\Model;

class Auth extends Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('url');
    }

    // Funkcja logowania
    public function login() {
        if ($this->session->userdata('logged_in')) {
            redirect('home');  // Jeżeli użytkownik jest już zalogowany, przekieruj na stronę główną
        }

        $this->load->view('auth/login');
    }

    // Funkcja do przetwarzania formularza logowania
    public function process_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->user_model->login_user($username, $password);

        if ($user) {
            $this->session->set_userdata('logged_in', true);
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('username', $user->username);
            $this->session->set_userdata('role', $user->rola);
            redirect('home');  // Po zalogowaniu, przekierowanie na stronę główną
        } else {
            $this->session->set_flashdata('error', 'Błędne dane logowania');
            redirect('auth/login');
        }
    }

    // Funkcja rejestracji
    public function register() {
        if ($this->session->userdata('logged_in')) {
            redirect('home');  // Jeżeli użytkownik jest już zalogowany, przekieruj na stronę główną
        }

        $this->load->view('auth/register');
    }

    // Funkcja do przetwarzania formularza rejestracji
    public function process_register() {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'imie' => $this->input->post('imie'),
            'nazwisko' => $this->input->post('nazwisko'),
            'adres' => $this->input->post('adres'),
        );

        // Sprawdzanie, czy użytkownik istnieje
        if ($this->user_model->user_exists($data['username'], $data['email'])) {
            $this->session->set_flashdata('error', 'Użytkownik o tej nazwie lub emailu już istnieje');
            redirect('auth/register');
        } else {
            $this->user_model->register_user($data);
            $this->session->set_flashdata('success', 'Rejestracja zakończona sukcesem');
            redirect('auth/login');
        }
    }

    // Funkcja wylogowania
    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }
}
?>
