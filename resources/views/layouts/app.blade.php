<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Guia RPG - @yield('title')</title>
    <style>
        /* Coloque aqui seu CSS base (pode copiar do seu home) */
        body {
            margin: 0;
            font-family: 'Georgia', serif;
            background: #f0e9dd;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 220px;
            background-color: #3e2c1c;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        .sidebar-content {
            display: flex;
            flex-direction: column;
        }

        .author {
            font-size: 12px;
            color: #ccc;
            text-align: center;
            margin-top: 20px;
            border-top: 1px solid #fff3;
            padding-top: 10px;
        }

        .nav-link {
            color: #f0e9dd;
            text-decoration: none;
            margin: 10px 0;
            padding: 8px 12px;
            background-color: #5a3e2d;
            border-radius: 5px;
            transition: 0.3s;
        }

        .nav-link:hover {
            background-color: #8c6344;
        }

        .main {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .title {
            font-size: 28px;
            color: #3e2c1c;
            margin-bottom: 10px;
            text-align: center;
        }

        /* Outros estilos que quiser */
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-content">
            <h2>Guia RPG</h2>
            <a href="{{ route('players.index') }}" class="nav-link">Personagem</a>
            <a href="{{ route('equipamentos.index') }}" class="nav-link">Equipamentos</a>
            <a href="{{ route('magias.index') }}" class="nav-link">Magias</a>
            <a href="{{ route('criaturas.index') }}" class="nav-link">Criaturas</a>
            <a href="{{ route('habilidades.index') }}" class="nav-link">Habilidades</a>
            <a href="{{ route('cenarios.index') }}" class="nav-link">Cenário</a>

            <!-- Adicione outras opções aqui -->
        </div>
        <div class="author">
            Autor: <strong>Frost Salazar</strong>
        </div>
    </div>

    <div class="main">
        <h1 class="title">@yield('title')</h1>
        @yield('content')
    </div>
</body>
</html>
