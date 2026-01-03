<h1>Create Role</h1>

<form action="{{ route('roles.store') }}" method="POST">
    @csrf

    {{-- Role Name --}}
    <label>Role Name</label><br>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <br><br>

    {{-- Permissions --}}
    <h2>Permissions</h2>
    @foreach($permissions as $permission)
        <label>
            <input type="checkbox"
                   name="permissions[]"
                   value="{{ $permission->name }}">
            {{ $permission->name }}
        </label><br>
    @endforeach
    @error('permissions')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <br>

    {{-- Users --}}
    <h3>Sync Role with Users</h3>
    @foreach($users as $user)
        <label>
            <input type="checkbox"
                   name="users[]"
                   value="{{ $user->id }}">
            {{ $user->name }}
        </label><br>
    @endforeach
    @error('users')
        <div style="color:red">{{ $message }}</div>
    @enderror

    <br><br>
    <button type="submit">Create & Sync Role</button>
</form>
