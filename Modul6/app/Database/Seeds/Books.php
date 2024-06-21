<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Books extends Seeder
{
    public function run()
    {
        $buku_data = [
			[
				'judul' => 'Little Magacal Piya',
				'penulis' => 'Cindyana H',
                'penerbit' => 'Fantasious',
                'tahun_terbit' => '2017'
			],
			[
				'judul' => 'Sky Academy',
				'penulis' => 'Cindyana H',
                'penerbit' => 'Fantasious',
                'tahun_terbit' => '2024'
			],
            [
				'judul' => 'The Case Book of Sherlock Holmes',
				'penulis' => 'Sir Arthur Conan Doyle',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => '2019'
			],
            [
				'judul' => 'The Return of Sherlock Holmes',
				'penulis' => 'Sir Arthur Conan Doyle',
                'penerbit' => 'Gramedia Pustaka Utama',
                'tahun_terbit' => '2019'
			]
		];

		foreach($buku_data as $data){
			$this->db->table('books')->insert($data);
		}
    }
}
