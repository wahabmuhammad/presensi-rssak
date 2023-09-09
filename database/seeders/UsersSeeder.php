<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Muhammad Abdul Wahab',
                'nip' => 'PK23054',
                'email' => 'wahabmuhammad95@gmail.com',
                'jabatan' => 'TIM IT',
                'role' => 'admin',
                'password'=>bcrypt('sarkies123')
            ],

            [
                'name' => 'Gilang Permana',
                'nip' => 'PK00053',
                'email' => 'gilangg@gmail.com',
                'jabatan' => 'TIM IT',
                'role' => 'pegawai',
                'password'=>bcrypt('sarkies123')
            ],

            [
                'name' => 'Wisnu Prasatya Surya Alam',
                'nip' => 'PK98052',
                'email' => 'wisnu666@gmail.com',
                'jabatan' => 'TIM IT',
                'role' => 'pegawai',
                'password'=>bcrypt('sarkies123')
            ],

            [
                'name' => 'Aulia Zumrotus Sholikhah',
                'nip' => '2398019',
                'email' => 'auliazumrotus@gmail.com',
                'jabatan' => 'Ka. Unit SDI dan Sanitasi',
                'role' => 'pegawai',
                'password'=>bcrypt('sarkies123')
            ],
        ];

        foreach ($userData as $Key => $val){
            User::create($val);
        }
    }
}
