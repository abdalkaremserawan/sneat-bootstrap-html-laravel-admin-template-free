<!DOCTYPE html>
<html>

<head>
  <title>Add Employee</title>
</head>

<body>

  <h1>Add Employee</h1>

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

  <form action="{{ route('employees.store') }}" method="POST">
    @csrf

    <div>
      <label>Name:</label>
      <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
      <label>Email:</label>
      <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
      <label>Password:</label>
      <input type="password" name="password" required>
    </div>

    <div>
      <label>Date of Birth:</label>
      <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}">
    </div>

    @foreach ($roles as $role)
      <label>
        <input type="checkbox" name="roles[]" value="{{ $role->name }}">
        {{ $role->name }}
      </label><br>
    @endforeach


    <button type="submit">Add Employee</button>

  </form>


</body>

</html>
