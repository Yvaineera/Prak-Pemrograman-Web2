<?php 

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        if ($this->isLoggedIn()) {
            return redirect()->to(base_url('dashboard'));
        }

        $data = [
            'title' => 'Login | CRUD dan Login pada Codeigniter @hari.oct_'
        ];

        return view('auth/login', $data);
    }

    public function login()
    {
        $data = $this->request->getPost(['email', 'password']);

        if (! $this->validateData($data, [
            'email' => 'required|valid_email',
            'password' => 'required'
        ])) {
            return $this->index();
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $credentials = ['email' => $email];

        $user = $this->model->where($credentials)->first();

        if (! $user || !password_verify($password, $user['password'])) {
            session()->setFlashdata('error', 'Email atau password anda salah.');
            return redirect()->back()->withInput();
        }

        $userData = [
            'username' => $user['username'],
            'email' => $user['email'],
            'logged_in' => TRUE
        ];

        session()->set($userData);
        return redirect()->to(base_url('dashboard'));
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

    private function isLoggedIn(): bool
    {
        return session()->get('logged_in') ? true : false;
    }
}