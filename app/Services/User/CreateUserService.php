<?php

namespace App\Services\User;

use App\Traits\LogTrait;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class CreateUserService
{
    use LogTrait;

    public function form()
    {
        $user = Auth::user();
        $roles = [];

        if ($user->role === 'Administrador') {
            $roles = config('settings.roles');
        }

        return view('app.users.create', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function execute(array $inputs)
    {
        try {
            $user = new User();
            $user->name = $inputs['name'];
            $user->email = $inputs['email'];
            $user->role = $inputs['role'];
            $user->password = bcrypt($inputs['password']);
            $user->user_id = Auth::id();
            $user->updated_at = null;
            $user->save();

            return redirect()->route('app.users.list')->with('message-toast', [
                'type' => 'success',
                'message' => 'Usuário cadastrado com sucesso.'
            ]);
        } catch (Exception $e) {
            $this->logError('Erro ao cadastrar usuário', __CLASS__, __FUNCTION__, $e);

            return back()->with('message-toast', [
                'type' => 'error',
                'message' => 'Não foi possível cadastrar, tente novamente.'
            ]);
        }
    }
}
