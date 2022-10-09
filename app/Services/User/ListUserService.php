<?php

namespace App\Services\User;

use App\User;
use Illuminate\Support\Facades\Auth;

class ListUserService
{
    public function execute()
    {
        $user = Auth::user();

        return view('app.users.list', [
            'users' => $this->getUsers($user->role)
        ]);
    }

    private function getUsers(string $role)
    {
        if ($role === 'Administrador') {
            return User::paginate(20);
        }

        return User::where('role', 'Cliente')->paginate(20);
    }
}
