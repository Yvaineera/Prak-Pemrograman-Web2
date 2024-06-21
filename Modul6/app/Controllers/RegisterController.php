<?php 

namespace App\Controllers;

use App\Models\UserModel;

class RegisterController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
        $this->helpers = ['form', 'url'];
    }

    public function index()
    {
        $data = [
            'title' => 'Register | CRUD dan Login pada Codeigniter @zafirarayfha'
        ];

        return view('auth/register', $data);
    }

    public function store()
    {
        $data = $this->request->getPost(['username', 'email', 'password']);

        if (! $this->validate([
            'username' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]'
        ])) {
            return $this->index();
        }

        $save = $this->model->save($data);

        if ($save) {
            session()->setFlashdata('success', 'Register Berhasil!');
            return redirect()->to(base_url('login'));
        } else {
            session()->setFlashdata('error', 'Gagal menyimpan data.');
            return redirect()->back()->withInput();
        }
    }
}