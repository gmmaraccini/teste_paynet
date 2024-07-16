<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinição de Senha</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Redefinição de Senha</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
        </div>
        <div class="form-group">
            <label for="senha">Nova Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" placeholder="Nova Senha" required>
        </div>
        <div class="form-group">
            <label for="senha_confirmation">Confirmar Nova Senha</label>
            <input type="password" class="form-control" id="senha_confirmation" name="senha_confirmation" placeholder="Confirmar Nova Senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Redefinir Senha</button>
    </form>
</div>
</body>
</html>
