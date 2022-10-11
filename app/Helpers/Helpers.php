<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

if (!function_exists('menu_active')) {
    /**
     * Retorna string "active" ou string vazia.
     *
     * @param array|string $routeName Nome da rota
     * @return string
     */
    function menu_active($routeName): string
    {
        $return = '';

        if (Route::is($routeName)) {
            $return = 'active';
        }

        return $return;
    }
}

if (!function_exists('menu_open')) {
    /**
     * Retorna string "menu-open" ou string vazia.
     *
     * @param array|string $routeName Nome da rota
     * @return string
     */
    function menu_open($routeName): string
    {
        $return = '';

        if (Route::is($routeName)) {
            $return = 'menu-open';
        }

        return $return;
    }
}

if (!function_exists('option_selected')) {
    /**
     * Verifica se a [option] deve ser selecionada.
     *
     * <select name="">
     *   <option value=""></option>
     * </select>
     *
     * @param string     $attrName  Atributo [name] da tag [select]
     * @param int|string $attrValue Atributo [value] da tag [option]
     * @param int|string $value     Valor a ser comparado com [$attrValue]
     * @return string
     */
    function option_selected(string $attrName, $attrValue, $value = ''): string
    {
        if (old($attrName) && $attrValue == old($attrName) || !old($attrName) && $attrValue == $value) {
            return 'selected';
        }

        return '';
    }
}

if (!function_exists('has_role')) {
    /**
     * Verifica se o usuário logado tem permissão.
     *
     * @param string $role Perfil separado por pipe "|".
     * @return boolean
     */
    function has_role(string $role): bool
    {
        $userRole = Auth::user()->role;

        if (strpos($role, '|') === false) {
            return $userRole === $role;
        }

        $roles = explode('|', $role);

        return in_array($userRole, $roles, true);
    }
}
