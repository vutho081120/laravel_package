<!-- Post Edit Body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-6">
                <form class="card" action="{{ route('admin.post.update', $postItem->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Post edit</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Post title</label>
                            <div>
                                <input type="text" class="form-control" aria-describedby="postTitleHelp"
                                    name="postTitle" placeholder="Enter post title" value="{{ $postItem->post_title }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            @if (isset($errors['postContent']) && $errors->has('postContent'))
                                <label class="form-label">Post content</label>
                                <textarea id="editor" class="form-control is-invalid" name="postContent" rows="6" placeholder="Content.."
                                    value="{{ $postItem->post_content }}"></textarea>
                                <div class="invalid-feedback">{{ $errors->first('postContent') }}</div>
                            @else
                                <label class="form-label">Post content</label>
                                <textarea id="editor" class="form-control" name="postContent" rows="6" placeholder="Content..">{{ $postItem->post_content }}</textarea>
                            @endif
                        </div>
                        <div class="mb-3">
                            @if (isset($errors['postImage']) && $errors->has('postImage'))
                                <div class="form-label is-invalid">Post image</div>
                                <input type="file" class="form-control" name="postImage"
                                    value="{{ $postItem->post_image }}">
                                <div class="invalid-feedback">{{ $errors->first('postImage') }}</div>
                            @else
                                <div class="form-label is-invalid">Post image</div>
                                <input type="file" class="form-control" name="postImage">
                            @endif

                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category name</label>
                            <div>
                                <select class="form-select" name="categoryId">
                                    @foreach ($categoryList as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($postItem->category_id == $category->id) selected @endif>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="col-6 col-sm-4 col-md-2 col-xl py-1">
                                    <a href="{{ route('admin.post.delete', $postItem->id) }}"
                                        class="btn btn-danger w-100">
                                        Delete
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
