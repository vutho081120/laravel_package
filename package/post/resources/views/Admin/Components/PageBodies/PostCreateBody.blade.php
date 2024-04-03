<!-- Post Create Body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-6">
                <form class="card" action="{{ route('admin.post.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Post create</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Post title</label>
                            <div>
                                @if (isset($errors['postTitle']) && $errors->has('postTitle'))
                                    <input type="text" class="form-control is-invalid"
                                        aria-describedby="postTitleHelp" name="postTitle"
                                        placeholder="Enter post title">
                                    <div class="invalid-feedback">{{ $errors->first('postTitle') }}</div>
                                @else
                                    <input type="text" class="form-control" aria-describedby="postTitleHelp"
                                        name="postTitle" placeholder="Enter post title">
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            @if (isset($errors['postContent']) && $errors->has('postContent'))
                                <label class="form-label">Post content</label>
                                <textarea id="editor" class="form-control is-invalid" name="postContent" rows="6" placeholder="Content.."></textarea>
                                <div class="invalid-feedback">{{ $errors->first('postContent') }}</div>
                            @else
                                <label class="form-label">Post content</label>
                                <textarea id="editor" class="form-control" name="postContent" rows="6" placeholder="Content.."></textarea>
                            @endif
                        </div>
                        <div class="mb-3">
                            @if (isset($errors['postImage']) && $errors->has('postImage'))
                                <div class="form-label is-invalid">Post image</div>
                                <input type="file" class="form-control" name="postImage">
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
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
