<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>Game Collection</title>
</head>
<body>

    <div class="container" style="margin:40px;">

        <nav class="mb-4">
            <a href="{{ route('permissions.index') }}" class="btn btn-secondary">
                Permissies
            </a>

            <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                Rollen
            </a>

            <a href="{{ route('role-permissions.index') }}" class="btn btn-secondary">
                Rol-permissies
            </a>

            <a href="{{ route('user-roles.index') }}" class="btn btn-secondary">
                Gebruiker-rollen
            </a>
        </nav>

        <h1 class="display-4">@yield('title')</h1>

        @yield('content')

    </div>

</body>
</html>