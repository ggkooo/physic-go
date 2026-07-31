<?php

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

if (!function_exists('acesso')) {
    /**
     * Verifica se o usuário autenticado pertence ao grupo informado.
     * Administradores possuem acesso a todos os grupos.
     */
    function acesso(string $grupo, int|bool $redirect = false): bool
    {
        if (!Auth::check()) {
            if ($redirect) {
                throw new HttpResponseException(
                    redirect()->route('login')->with('danger', 'Por favor, efetue seu login para continuar.')
                );
            }

            return false;
        }

        if (Auth::user()->hasAccess($grupo)) {
            return true;
        }

        if ((int) $redirect === 1) {
            abort(404);
        }

        if ((int) $redirect === 2) {
            throw new HttpResponseException(
                redirect()->route('login')->with('danger', 'Você não possui permissão para acessar esta página.')
            );
        }

        return false;
    }
}
