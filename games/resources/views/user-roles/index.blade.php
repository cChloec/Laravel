@extends('base')

@section('content')
<div class="container">
    <h1>Rollen aan gebruikers koppelen</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Gebruiker</th>
                <th>Rol</th>
                <th>Actie</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->name }}
                    </td>

                    <td>
                        <form action="{{ route('user-roles.update', $user->id) }}"
                              method="POST">
                            @csrf
                            @method('PUT')

                            <select name="role" class="form-control">
                                <option value="">Geen rol</option>

                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}"
                                        {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                    </td>

                    <td>
                            <button type="submit" class="btn btn-primary">
                                Opslaan
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection