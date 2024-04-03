<div>
    <h3>Alert Component</h3>

    <p>{{ $title }}</p>
    <p>Email: {{ $email }}</p>

    @if (isset($users))
        @foreach ($users as $user)
            <p><small>{{ $user->name }}</small></p>
        @endforeach
    @endif

</div>
