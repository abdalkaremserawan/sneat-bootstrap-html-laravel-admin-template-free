<!DOCTYPE html>
<html>
<head>
    <title>Employees</title>
</head>
<body>

<h1>Employees</h1>

<a href="{{ route('employees.create') }}">Add Employee</a>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->user->name ?? '-' }}</td>
            <td>{{ $employee->email }}</td>
            <td>
                <a href="{{ route('employees.edit', $employee) }}">Edit</a>

                <form action="{{ route('employees.destroy', $employee) }}"
                      method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
