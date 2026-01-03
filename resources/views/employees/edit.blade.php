<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>

<h1>Edit Employee</h1>

<a href="{{ route('employees.index') }}">Back to Employees</a>

@if ($errors->any())
    <div style="color: red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('employees.update', $employee) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Name:</label>
        <input type="text" name="name"
               value="{{ old('name', $employee->user->name ?? '') }}"
               required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email"
               value="{{ old('email', $employee->email) }}"
               required>
    </div>

    <div>
        <label>Password (leave blank if not changing):</label>
        <input type="password" name="password">
    </div>

    <div>
        <label>Date of Birth:</label>
        <input type="date" name="date_of_birth"
               value="{{ old('date_of_birth', $employee->user->date_of_birth ?? '') }}">
    </div>

    <div>
        <label>
            <input type="checkbox" name="is_admin" value="1"
                {{ $employee->is_admin ? 'checked' : '' }}>
            Is Admin
        </label>
    </div>

    <button type="submit">Update Employee</button>
</form>
  <h3>Sync Users with Role</h3>


  <form action="{{ route('users.roles.sync', $employee) }}" method="POST" style="margin-bottom:10px;">
    @csrf
    @foreach ($roles as $role)
      <label>
        <input type="checkbox" name="roles[]" value="{{ $role->name }}"
         {{ $employee->hasRole($role->name) ? 'checked' : '' }}>
        {{ $role->name }}
      </label><br>
    @endforeach


    <button type="submit">Sync Role</button>
  </form>


</body>
</html>
