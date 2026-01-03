<!DOCTYPE html>
<html>
<head>
    <title>Customers</title>
    <style>
        img.avatar {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<h1>Customers</h1>

<a href="{{ route('customers.create') }}">Add Customer</a><br><br>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Date of Birth</th>
        <th>Photo</th>
        <th>Actions</th>
    </tr>

    @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->user->name ?? '-' }}</td>
            <td>{{ $customer->phone }}</td>
            <td>{{ $customer->user->date_of_birth ?? '-' }}</td>
            <td>
                @if($customer->hasMedia('photos'))
                    <img src="{{ $customer->getFirstMediaUrl('photos') }}"
                         class="avatar"
                         alt="Customer Photo"
                         loading="lazy">
                @else
                    <span>—</span>
                @endif
            </td>
            <td>
                <a href="{{ route('customers.edit', $customer) }}">Edit</a>

                <form method="POST"
                      action="{{ route('customers.destroy', $customer) }}"
                      style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
