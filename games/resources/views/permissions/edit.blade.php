@extends('base')

@section('content')
<div class="container">
    <h1>Permissie bewerken</h1>

    <form action="{{ route('permissions.update', $permission->id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Naam</label>
            <input type="text"
                   name="name"
                   id="name"
                   class="form-control"
                   value="{{ old('name', $permission->name) }}"
                   required>

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <p>Guard: web (automatisch)</p>

        <button type="submit" class="btn btn-success">
            Wijzigingen opslaan
        </button>

        <a href="{{ route('permissions.index') }}"
           class="btn btn-secondary">
            Annuleren
        </a>
    </form>
</div>
@endsection
