<!-- User Body -->
<div class="page-body">
    <div class="container-xl">
        @if (isset($userList) && count($userList) > 0)
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Phone</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Date Of Birth</th>
                                    <th>Role</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userList as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td class="text-muted">{{ $user->user_name }}</td>
                                        <td class="text-muted">{{ $user->gender }}</td>
                                        <td class="text-muted">{{ $user->date_of_birth }}</td>
                                        <td class="text-muted">{{ $user->role }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.editShow', $user->id) }}">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries
                        </p>

                        @if (isset($userList) && count($userList) > 0)
                            {{ $userList->appends(request()->input())->links('post::Admin.Components.Paginations.Default') }}
                        @endif
                    </div>
                </div>
            </div>
        @else
            <h2 class="page-title"> Empty category </h2>
        @endif
    </div>
</div>
