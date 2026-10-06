@extends('base')

@section('content')
<div class="container">
    <h1>Rol bewerken</h1>

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text"
                   name="name"
                   id="name"
                   class="form-control"
                   value="{{ $role->name }}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">
            Wijzigen
        </button>

        <a href="{{ route('roles.index') }}"
           class="btn btn-secondary mt-3">
            Annuleren
        </a>
    </form>
</div>
@endsection