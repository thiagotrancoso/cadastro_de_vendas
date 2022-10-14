<?php

namespace App\Services\Product;

use App\Product;
use App\Traits\LogTrait;
use Exception;
use Illuminate\Support\Facades\Auth;

class CreateProductService
{
    use LogTrait;

    public function form()
    {
        return view('app.products.create');
    }

    public function execute(array $inputs)
    {
        try {
            $user = new Product();
            $user->name = $inputs['name'];
            $user->price = $inputs['price'];
            $user->description = $inputs['description'];
            $user->active = $inputs['active'];
            $user->user_id = Auth::id();
            $user->updated_at = null;
            $user->save();

            return redirect()->route('app.products.list')->with('message-toast', [
                'type' => 'success',
                'message' => 'Produto cadastrado com sucesso.'
            ]);
        } catch (Exception $e) {
            $this->logError('Erro ao cadastrar produto', __CLASS__, __FUNCTION__, $e);

            return back()->with('message-toast', [
                'type' => 'error',
                'message' => 'Não foi possível cadastrar, tente novamente.'
            ]);
        }
    }
}
