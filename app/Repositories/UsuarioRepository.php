<?php
namespace App\Repositories;

use App\Models\Usuario;

class UsuarioRepository
{
    public function create($data)
    {
        return Usuario::create($data);
    }

    public function getAll()
    {
        return Usuario::all();
    }

    public function findByEmail($email)
    {
        return Usuario::where('email', $email)->first();
    }
}
