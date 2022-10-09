<?php

namespace App\Services\User;

use App\Traits\LogTrait;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class DeleteUserService
{
    use LogTrait;

    /**
     * @param integer $id ID do usuário.
     */
    public function execute(int $id)
    {
        try {
            $userLogged = Auth::user();

            if ($userLogged->role !== 'Administrador') {
                return back()->with('message-toast', [
                    'type' => 'error',
                    'message' => 'Somente administrador pode excluir usuários.'
                ]);
            }

            $userDelete = User::find($id);

            if ($userLogged->id === $userDelete->id) {
                return back()->with('message-toast', [
                    'type' => 'error',
                    'message' => 'Não é possível se auto-excluir.'
                ]);
            }

            $userDelete->delete();

            return redirect()->route('app.users.list')->with('message-toast', [
                'type' => 'success',
                'message' => 'Usuário excluído com sucesso.'
            ]);
        } catch (Exception $e) {
            $this->logError('Erro ao excluir usuário', __CLASS__, __FUNCTION__, $e);

            return back()->with('message-toast', [
                'type' => 'error',
                'message' => 'Não foi possível excluir, tente novamente.'
            ]);
        }
    }
}
