<!DOCTYPE html>
<html>
<head>
    <title>Create Customer</title>
</head>
<body>

<h1>Create Customer</h1>

<a href="{{ route('customers.index') }}">Back to Customers</a><br><br>

<form method="POST" action="{{ route('customers.store') }}" enctype="multipart/form-data">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name') }}" required><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ old('phone') }}" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <label>Date of Birth:</label>
    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}"><br><br>

    <label>Photo (optional):</label>
    <input type="file" name="photo"><br><br>

    <button type="submit">Save</button>
</form>

@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>
