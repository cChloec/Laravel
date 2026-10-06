@extends('base')

@section('content')
<div class="container">
    <h1>Nieuwe rol toevoegen</h1>

    <form action="{{ route('roles.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text"
                   name="name"
                   id="name"
                   class="form-control"
                   required>
        </div>

        <button type="submit" class="btn btn-success mt-3">
            Opslaan
        </button>

        <a href="{{ route('roles.index') }}"
           class="btn btn-secondary mt-3">
            Annuleren
        </a>
    </form>
</div>
@endsection