<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@mail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$XtuZHlp3.P7qnWPbTIfnZupOsi3z2bLPC7gcEsvhWu793G/wexhlW', // 12345678
            'role' => 'Administrador',
            'active' => true,
            'updated_at' => null
        ]);

        User::create([
            'name' => 'Usuário',
            'email' => 'user@mail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$XtuZHlp3.P7qnWPbTIfnZupOsi3z2bLPC7gcEsvhWu793G/wexhlW', // 12345678
            'role' => 'Cliente',
            'active' => false,
            'updated_at' => null
        ]);
    }
}
