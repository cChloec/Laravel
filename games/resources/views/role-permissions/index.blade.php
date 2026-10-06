@extends('base')

@section('content')
<div class="container">
    <h1>Permissies aan rollen koppelen</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @foreach ($roles as $role)
        <div class="card mb-4">
            <div class="card-header">
                <h4>{{ $role->name }}</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('role-permissions.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input type="checkbox"
                                   name="permissions[]"
                                   value="{{ $permission->name }}"
                                   class="form-check-input"
                                   id="permission_{{ $role->id }}_{{ $permission->id }}"
                                   {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>

                            <label class="form-check-label"
                                   for="permission_{{ $role->id }}_{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary mt-3">
                        Opslaan
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection