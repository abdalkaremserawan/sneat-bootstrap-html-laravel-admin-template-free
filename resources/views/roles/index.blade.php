<h1>Roles List</h1>

<a href="{{ route('roles.create') }}">Create New Role</a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Role Name</th>
            <th>Permissions</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->name }}</td>

                <td>
                    @forelse($role->permissions as $permission)
                        {{ $permission->name }}{{ !$loop->last ? ', ' : '' }}
                    @empty
                        No permissions
                    @endforelse
                </td>

                <td>
                    <a href="{{ route('roles.edit', $role) }}">Edit</a>

                    <form action="{{ route('roles.destroy', $role) }}"
                          method="POST"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('Delete this role?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
