<?php
namespace App\Services;

use App\Repositories\UsuarioRepository;

class UsuarioService
{
    protected $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function register($data)
    {
        // Adicionar lógica para hashear senha
        $data['senha'] = bcrypt($data['senha']);
        return $this->usuarioRepository->create($data);
    }

    public function getAllUsers()
    {
        return $this->usuarioRepository->getAll();
    }
}
