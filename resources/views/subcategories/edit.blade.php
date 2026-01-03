<!DOCTYPE html>
<html>
<head>
    <title>Edit SubCategory</title>
</head>
<body>

<h1>Edit SubCategory</h1>

<form method="POST" action="{{ route('subcategories.update', $subCategory) }}">
    @csrf
    @method('PUT')

    <input type="number" name="category_id" value="{{ $subCategory->category_id }}" required><br><br>

    <input type="text" name="name" value="{{ $subCategory->name }}" required><br><br>
    <textarea name="description">{{ $subCategory->description }}</textarea><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
