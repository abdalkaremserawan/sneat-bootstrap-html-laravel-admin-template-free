<h2>Dashboard</h2>
<p>مرحبا {{ auth()->user()->name ?? 'مستخدم' }}</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
