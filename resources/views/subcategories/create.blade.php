<!DOCTYPE html>
<html>
<head>
    <title>Create SubCategory</title>
</head>
<body>

<h1>Create SubCategory</h1>

<form method="POST" action="{{ route('subcategories.store') }}">
    @csrf

    <input type="number" name="category_id" placeholder="Category ID" required><br><br>

    <input type="text" name="name" placeholder="Name" required><br><br>
    <textarea name="description" placeholder="Description"></textarea><br><br>

    <button type="submit">Save</button>
</form>

</body>
</html>
