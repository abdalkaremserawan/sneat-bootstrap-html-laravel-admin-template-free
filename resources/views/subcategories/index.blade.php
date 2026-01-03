<!DOCTYPE html>
<html>
<head>
    <title>SubCategories</title>
</head>
<body>

<h1>SubCategories</h1>

<a href="{{ route('subcategories.create') }}">Add SubCategory</a>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
    <tr>
        <th>Category Name</th>
        <th>Name</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>

    @foreach($subCategories as $subCategory)
        <tr>
            <td>{{ $subCategory->category_name }}</td>
            <td>{{ $subCategory->name }}</td>
            <td>{{ $subCategory->description }}</td>
            <td>
                <a href="{{ route('subcategories.edit', $subCategory) }}">Edit</a>

                <form action="{{ route('subcategories.destroy', $subCategory) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>
