<h1>Edit Role: {{ $role->name }}</h1>

{{-- Update Role --}}
<form action="{{ route('roles.update', $role) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Role Name</label><br>
    <input type="text" name="name" value="{{ old('name', $role->name) }}">

    @error('name')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <br><br>
    <button type="submit">Update Role</button>
</form>

<hr>

{{-- Sync Permissions --}}
<h3>Sync Permissions</h3>

<form action="{{ route('roles.syncPermissions', $role) }}" method="POST">
    @csrf

    @foreach($permissions as $permission)
        <label>
            <input type="checkbox"
                   name="permissions[]"
                   value="{{ $permission->name }}"
                   {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
            {{ $permission->name }}
        </label><br>
    @endforeach

    <br>
    <button type="submit">Sync Permissions</button>
</form>

<hr>

{{-- Sync Users with this Role --}}

