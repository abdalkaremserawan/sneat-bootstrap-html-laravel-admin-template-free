<!DOCTYPE html>
<html>
<head>
    <title>Create Category</title>
</head>
<body>

<h1>Create Category</h1>

<!-- أزرار تبديل اللغة -->
<a href="{{ route('lang', 'ar') }}">عربي</a> |
<a href="{{ route('lang', 'en') }}">English</a>

<br><br>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    <!-- الحقول باللغتين -->
    <input type="text" name="name[en]" placeholder="Name (EN)" required><br><br>
    <input type="text" name="name[ar]" placeholder="Name (AR)" required><br><br>

    <textarea name="description[en]" placeholder="Description (EN)"></textarea><br><br>
    <textarea name="description[ar]" placeholder="Description (AR)"></textarea><br><br>

    <button type="submit">Save</button>
</form>

</body>
</html>
