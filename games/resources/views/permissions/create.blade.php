@extends('base')

@section('content')
<div class="container">
    <h1>Nieuwe permissie</h1>

    <form action="{{ route('permissions.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Naam</label>
            <input type="text"
                   name="name"
                   id="name"
                   class="form-control"
                   value="{{ old('name') }}"
                   required>

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <p>Guard: web (automatisch)</p>

        <button type="submit" class="btn btn-success">
            Opslaan
        </button>

        <a href="{{ route('permissions.index') }}"
           class="btn btn-secondary">
            Annuleren
        </a>
    </form>
</div>
@endsection
