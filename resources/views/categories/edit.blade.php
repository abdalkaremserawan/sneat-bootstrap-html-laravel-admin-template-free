<!DOCTYPE html>
<html>
<head>
    <title>Edit Category</title>
</head>
<body>

<h1>Edit Category</h1>

<!-- أزرار تبديل اللغة -->
<a href="{{ route('lang', 'ar') }}">عربي</a> |
<a href="{{ route('lang', 'en') }}">English</a>

<br><br>

<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf
    @method('PUT')

    <!-- عرض القيم الحالية باللغتين -->
    <input type="text" name="name[en]" value="{{ $category->getTranslation('name','en') }}" required><br><br>
    <input type="text" name="name[ar]" value="{{ $category->getTranslation('name','ar') }}" required><br><br>

    <textarea name="description[en]">{{ $category->getTranslation('description','en') }}</textarea><br><br>
    <textarea name="description[ar]">{{ $category->getTranslation('description','ar') }}</textarea><br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
