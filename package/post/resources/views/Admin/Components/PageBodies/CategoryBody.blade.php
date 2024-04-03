<!-- Category Body -->
<div class="page-body">
    <div class="container-xl">
        @if (isset($categoryList) && count($categoryList) > 0)
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>User Id</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoryList as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                            @if ($category->category_status == 1)
                                                Hoạt động
                                            @elseif ($category->category_status == 0)
                                                Không hoạt động
                                            @endif
                                        </td>
                                        <td>{{ $category->user_id }}</td>
                                        <td>
                                            <a href="{{ route('admin.category.editShow', $category->id) }}">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>

                        @if (isset($categoryList) && count($categoryList) > 0)
                            {{ $categoryList->appends(request()->input())->links('post::Admin.Components.Paginations.Default') }}
                        @endif
                    </div>
                </div>
            </div>
        @else
            <h2 class="page-title"> Empty category </h2>
        @endif
    </div>
</div>
