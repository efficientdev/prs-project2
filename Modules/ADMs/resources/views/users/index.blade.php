<x-app-layout>

    <h2 class="mb-4">User Role Management</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('admin.users.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="query" class="form-control" placeholder="Search users..." value="{{ request('query') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    @forelse ($users as $user)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <strong>{{ $user->name }}</strong>
                <span>{{ $user->email }}</span>
            </div>
            <div class="card-body">
                <h5>Current Roles:</h5>
                <ul class="list-inline">
                    @forelse($user->roles as $role)
                        <li class="list-inline-item">
                            <form action="{{ route('admin.users.removeRole', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="role" value="{{ $role->name }}">
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Remove role {{ $role->name }}?')">
                                    {{ $role->name }} &times;
                                </button>
                            </form>
                        </li>
                    @empty
                        <li class="text-muted">No roles assigned</li>
                    @endforelse
                </ul>

                <form action="{{ route('admin.users.assignRole', $user->id) }}" method="POST" class="d-flex mt-2" style="max-width: 400px;">
                    @csrf
                    <select name="role" class="form-select me-2">
                        @foreach($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-success">Assign Role</button>
                </form>
            </div>
        </div>
    @empty
        <div class="alert alert-info">No users found.</div>
    @endforelse 

</x-app-layout>

