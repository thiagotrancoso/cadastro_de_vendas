<?php

namespace App\Services\User;

use App\Traits\LogTrait;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class EditUserService
{
    use LogTrait;

    /**
     * @param integer $id ID do usuário
     */
    public function form(int $id)
    {
        $user = Auth::user();
        $userEdit = User::find($id);
        $roles = [];

        if ($user->role === 'Administrador') {
            $roles = config('settings.roles');
        }

        return view('app.users.edit', [
            'user' => $user,
            'userEdit' => $userEdit,
            'roles' => $roles
        ]);
    }

    /**
     * @param array   $inputs Dados do formulário
     * @param integer $id     ID do usuário
     */
    public function execute(array $inputs, int $id)
    {
        try {
            $currentPasswordIsOk = Auth::validate(['email' => Auth::user()->email, 'password' => $inputs['current_password']]);
            if (!empty($inputs['current_password']) && !$currentPasswordIsOk) {
                return back()->with('message-toast', [
                    'type' => 'warning',
                    'message' => 'Senha atual informada está incorreta.'
                ]);
            }

            $user = User::find($id);
            $user->name = $inputs['name'];
            $user->email = $inputs['email'];
            $user->active = $inputs['active'];

            if (!empty($inputs['role'])) {
                $user->role = $inputs['role'];
            }

            if (!empty($inputs['password'])) {
                $user->password = bcrypt($inputs['password']);
            }

            $user->save();

            return back()->with('message-toast', [
                'type' => 'success',
                'message' => 'Usuário atualizado com sucesso.'
            ]);
        } catch (Exception $e) {
            $this->logError('Erro ao atualizar usuário', __CLASS__, __FUNCTION__, $e);

            return back()->with('message-toast', [
                'type' => 'error',
                'message' => 'Não foi possível atualizar, tente novamente!.'
            ]);
        }
    }
}
