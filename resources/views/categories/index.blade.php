<!DOCTYPE html>
<html>

<head>
  <title>Categories</title>
</head>

<body>

  <h1> @lang('messages.Categories')</h1>

  <!-- أزرار تبديل اللغة -->
  <a href="{{ route('lang', 'ar') }}">عربي</a> |
  <a href="{{ route('lang', 'en') }}">English</a>

  <br><br>

  <a href="{{ route('categories.create') }}">@lang('messages.Add Category')</a>

  @if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
  @endif

  <table border="1" cellpadding="5">
    <tr>
      <th>@lang('messages.Name')</th>
      <th>Description</th>
      <th>Actions</th>
    </tr>

    @foreach ($categories as $category)
      <tr>
        <!-- Spatie يحدد اللغة حسب app()->getLocale() -->
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td>
          <a href="{{ route('categories.edit', $category) }}">Edit</a>

          <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline">
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
