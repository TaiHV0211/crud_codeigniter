<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ContactsSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        for ($i = 0 ; $i < 50 ; $i++){
            array_push($data ,[
                'name' => 'Hồ Văn Tài',
                'email' => 'vantai'.$i.'@gmail.com',
                'phone' => '090911001'.$i,
                'content' => "Nội dung: ".$i
            ]);
        }
        $this->db->table('contacts')->insertBatch($data);
    }
}
