<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Usuários Cadastrados</h2>
    <ul class="list-group">
        @foreach($usuarios as $usuario)
            <li class="list-group-item">{{ $usuario->nome_completo }} - {{ $usuario->email }}</li>
        @endforeach
    </ul>
</div>
</body>
</html>
