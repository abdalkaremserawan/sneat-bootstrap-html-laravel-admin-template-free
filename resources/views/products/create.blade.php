<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>
</head>
<body>

<h1>Create Product</h1>

<form method="POST" action="{{ route('products.store') }}">
    @csrf

    <label>SubCategory ID</label><br>
    <input type="number" name="sub_category_id" placeholder="SubCategory ID" required><br><br>

    <input type="text" name="name" placeholder="Name" required><br><br>
    <textarea name="description" placeholder="Description"></textarea><br><br>
    <input type="number" step="0.01" name="price" placeholder="Price" required><br><br>

    <button type="submit">Save</button>
</form>

</body>
</html>
