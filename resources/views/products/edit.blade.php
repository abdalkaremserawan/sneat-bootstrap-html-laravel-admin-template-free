<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>

<h1>Edit Product</h1>

<form method="POST" action="{{ route('products.update', $product) }}">
    @csrf
    @method('PUT')

    <label>SubCategory ID</label><br>
    <input type="number" name="sub_category_id" value="{{ $product->sub_category_id }}" required><br><br>

    <input type="text" name="name" value="{{ $product->name }}" required><br><br>
    <textarea name="description">{{ $product->description }}</textarea><br><br>
    <input type="number" step="0.01" name="price" value="{{ $product->price }}" required><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
