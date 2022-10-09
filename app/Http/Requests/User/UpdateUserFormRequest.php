<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    public function all($keys = null)
    {
        $inputs = parent::all();
        $inputs['active'] = isset($inputs['active']);
        $inputs['role'] = $inputs['role'] ?? null;

        return $inputs;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userEditId = $this->route('id') ?? '';

        return [
            'name' => 'required|string',
            'active' => 'required|boolean',
            'email' => "required|email|unique:users,email,{$userEditId}",
            'role' => 'nullable|string',
            'password' => 'nullable|min:8|required_with:current_password',
            'current_password' => 'nullable|min:8|required_with:password'
        ];
    }
}
