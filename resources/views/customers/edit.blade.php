<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>

<h1>Edit Customer</h1>

<a href="{{ route('customers.index') }}">Back to Customers</a><br><br>

<form method="POST" action="{{ route('customers.update', $customer) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name', $customer->user->name ?? '') }}" required><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="{{ old('phone', $customer->phone) }}" required><br><br>

    <label>Password (leave blank if not changing):</label>
    <input type="password" name="password"><br><br>

    <label>Date of Birth:</label>
    <input type="date" name="date_of_birth" value="{{ old('date_of_birth', $customer->user->date_of_birth ?? '') }}"><br><br>

    <label>Photo (optional):</label>
    <input type="file" name="photo"><br>
    @if($customer->getFirstMediaUrl('photos'))
        <img src="{{ $customer->getFirstMediaUrl('photos') }}" alt="Customer Photo" width="100">
    @endif
    <br><br>

    <button type="submit">Update</button>
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
