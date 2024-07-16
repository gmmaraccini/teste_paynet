<?php
// app/Http/Controllers/Auth/RegisteredUserController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.cadastro');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_completo' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'senha' => 'required|string|min:8|confirmed',
            'cep' => 'required|string|max:9',
            'rua' => 'required|string|max:255',
            'bairro' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'cidade' => 'required|string|max:255',
            'estado' => 'required|string|max:2',
        ]);

        $endereco = $this->buscarEnderecoPorCep($request->cep);

        $usuario = Usuario::create([
            'nome_completo' => $request->nome_completo,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'cep' => $request->cep,
            'rua' => $endereco['logradouro'] ?? $request->rua,
            'bairro' => $endereco['bairro'] ?? $request->bairro,
            'numero' => $request->numero,
            'cidade' => $endereco['localidade'] ?? $request->cidade,
            'estado' => $endereco['uf'] ?? $request->estado,
        ]);

        return redirect()->route('login')->with('success', 'Cadastro realizado com sucesso!');
    }

    private function buscarEnderecoPorCep($cep)
    {
        $client = new Client();
        $response = $client->get("https://viacep.com.br/ws/{$cep}/json/");
        return json_decode($response->getBody(), true);
    }
}


