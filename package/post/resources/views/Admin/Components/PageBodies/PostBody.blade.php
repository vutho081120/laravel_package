<!-- Post Body -->
<div class="page-body">
    <div class="container-xl">
        @if (isset($postList) && count($postList) > 0)
            <div class="col-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Category Id</th>
                                    <th class="w-1"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postList as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->post_title }}</td>
                                        <td class="text-muted">{{ $post->post_content }}</td>
                                        <td class="text-muted">{{ $post->post_image }}</td>
                                        <td class="text-muted">{{ $post->category_id }}</td>
                                        <td>
                                            <a href="{{ route('admin.post.editShow', $post->id) }}">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries
                        </p>

                        @if (isset($postList) && count($postList) > 0)
                            {{ $postList->appends(request()->input())->links('post::Admin.Components.Paginations.Default') }}
                        @endif
                    </div>
                </div>
            </div>
        @else
            <h2 class="page-title"> Empty post </h2>
        @endif
    </div>
</div>
