<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'remember_token' => Str::random(10),
            'updated_at' => null
        ]);

        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@mail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$XtuZHlp3.P7qnWPbTIfnZupOsi3z2bLPC7gcEsvhWu793G/wexhlW', // 12345678
            'role' => 'Cliente',
            'active' => true,
            'remember_token' => Str::random(10),
            'updated_at' => null
        ]);

        User::create([
            'name' => 'Vendedor',
            'email' => 'vendedor@mail.com',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => '$2y$10$XtuZHlp3.P7qnWPbTIfnZupOsi3z2bLPC7gcEsvhWu793G/wexhlW', // 12345678
            'role' => 'Vendedor',
            'active' => true,
            'remember_token' => Str::random(10),
            'updated_at' => null
        ]);

        factory(User::class, 100)->create();
    }
}
