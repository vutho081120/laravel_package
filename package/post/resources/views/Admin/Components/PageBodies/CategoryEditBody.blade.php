<!-- Category Edit Body -->
<div class="page-body">
    <div class="container-xl">
        <div class="row row-cards">
            <div class="col-md-6">
                <form class="card" action="{{ route('admin.category.update', $categoryItem->id) }}" method="POST">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Category edit</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Category name</label>
                            <div>
                                @if (isset($errors['categoryName']) && $errors->has('categoryName'))
                                    <input type="text" class="form-control is-invalid"
                                        aria-describedby="categoryNameHelp" name="categoryName"
                                        placeholder="Enter category name" value="{{ $categoryItem->category_name }}">
                                    <div class="invalid-feedback">{{ $errors->first('categoryName') }}</div>
                                @else
                                    <input type="text" class="form-control" aria-describedby="categoryNameHelp"
                                        name="categoryName" placeholder="Enter category name"
                                        value="{{ $categoryItem->category_name }}">
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category status</label>
                            <div>
                                <select class="form-select" name="categoryStatus">
                                    <option value="1" @if ($categoryItem->category_status == 1) selected @endif>Hoạt động
                                    </option>
                                    <option value="0" @if ($categoryItem->category_status == 0) selected @endif>Không hoạt
                                        động</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="col-6 col-sm-4 col-md-2 col-xl py-1">
                                    <a href="{{ route('admin.category.delete', $categoryItem->id) }}"
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
