<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome_completo',
        'senha',
        'email',
        'password',
        'cep',
        'rua',
        'bairro',
        'numero',
        'cidade',
        'estado',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
