<?php

namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\Controller;

class BookController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new BookModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data['books'] = $this->model->findAll();
        return view('books/index', $data);
    }

    public function create()
    {
        return view('books/create');
    }

    public function store()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer|greater_than[1800]|less_than[2024]',
        ], [
            'judul' => [
                'required' => 'Judul harus diisi.',
                'string' => 'Judul harus berupa string.',
            ],
            'penulis' => [
                'required' => 'Penulis harus diisi.',
                'string' => 'Penulis harus berupa string.',
            ],
            'penerbit' => [
                'required' => 'Penerbit harus diisi.',
                'string' => 'Penerbit harus berupa string.',
            ],
            'tahun_terbit' => [
                'required' => 'Tahun terbit harus diisi.',
                'integer' => 'Tahun terbit harus berupa angka.',
                'greater_than' => 'Tahun terbit harus lebih besar dari 1800.',
                'less_than' => 'Tahun terbit harus lebih kecil dari 2024.',
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ];

        if ($this->model->insert($data)) {
            session()->setFlashdata('success', 'Buku berhasil ditambahkan.');
            return redirect()->to('/books');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan. Silakan coba lagi.');
            return view('books/create');
        }
    }

    public function edit($id)
    {
        $data['book'] = $this->model->find($id);
        return view('books/edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer|greater_than[1800]|less_than[2024]',
        ], [
            'judul' => [
                'required' => 'Judul harus diisi.',
                'string' => 'Judul harus berupa string.',
            ],
            'penulis' => [
                'required' => 'Penulis harus diisi.',
                'string' => 'Penulis harus berupa string.',
            ],
            'penerbit' => [
                'required' => 'Penerbit harus diisi.',
                'string' => 'Penerbit harus berupa string.',
            ],
            'tahun_terbit' => [
                'required' => 'Tahun terbit harus diisi.',
                'integer' => 'Tahun terbit harus berupa angka.',
                'greater_than' => 'Tahun terbit harus lebih besar dari 1800.',
                'less_than' => 'Tahun terbit harus lebih kecil dari 2024.',
            ],
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ];

        if ($this->model->update($id, $data)) {
            session()->setFlashdata('success', 'Buku berhasil diperbarui.');
            return redirect()->to('/books');
        } else {
            session()->setFlashdata('error', 'Terjadi kesalahan. Silakan coba lagi.');
            return view('books/edit', ['book' => $this->model->find($id)]);
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        session()->setFlashdata('success', 'Buku berhasil dihapus.');
        return redirect()->to('/books');
    }
}