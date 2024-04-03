<?php

namespace Mallcode\Post\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mallcode\Post\Models\CategoryModel;
use Mallcode\Post\Models\PostModel;

class CategoryController extends Controller
{
    public function index()
    {
        $category = new CategoryModel();

        $categoryList = $category->getAllCategories();

        return view('post::Admin.Pages.Category', compact('categoryList'));
    }

    public function createShow()
    {
        return view('post::Admin.Pages.CategoryCreate');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoryName' => 'required|min:3|max:20',
        ], [
            'categoryName.required' => 'You have not entered your category name',
            'categoryName.min' => 'Category name must be at least 3 characters long',
            'categoryName.max' => 'category name must be no longer than 20 characters',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = new CategoryModel();
        $checkCategory = $category->categoryCheck($request->categoryName);

        if (!$checkCategory) {
            $newCategory = new CategoryModel();

            $newCategory->category_name = $request->categoryName;
            $newCategory->category_slug = Str::slug($request->categoryName);
            $newCategory->category_status = $request->categoryStatus;
            $newCategory->user_id = 1;

            $newCategory->save();
            return redirect('admin/category')->with('status', 'Bạn đã thêm danh mục thành công');
        } else {
            return redirect()->back()->with('error', 'Danh mục đã tồn tại');
        }
    }

    public function editShow($id)
    {
        $category = new CategoryModel();
        $categoryItem = $category->getCategoryById($id);

        return view('post::Admin.Pages.CategoryEdit', compact('categoryItem'));
    }

    public function update(Request $request, $id)
    {
        $category = new CategoryModel();
        $categoryItem = $category->getCategoryById($id);

        $validator = Validator::make($request->all(), [
            'categoryName' => 'required|min:3|max:20',
        ], [
            'categoryName.required' => 'You have not entered your category name',
            'categoryName.min' => 'Category name must be at least 3 characters long',
            'categoryName.max' => 'category name must be no longer than 20 characters',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $categoryItem->category_name = $request->categoryName;
        $categoryItem->category_slug = Str::slug($request->categoryName);
        $categoryItem->category_status = $request->categoryStatus;

        $categoryItem->save();

        return redirect('admin/category/edit/' . $categoryItem->id)->with('status', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $category = new CategoryModel();
        $categoryItem = $category->getCategoryById($id);

        $post = new PostModel();
        $postCheck = $post->postCheckCategory($id);

        if (isset($postCheck) && count($postCheck) > 0) {
            return redirect('admin/category/edit/' . $id)->with('error', 'Bạn chưa xóa bài viết chứa danh mục');
        } else {
            $categoryItem->delete();
            return redirect('admin/category')->with('status', 'Xóa thành công');
        }
    }

    public function search(Request $request)
    {
        $category = new CategoryModel();
        $categoryList = $category->categorySearch($request->search);

        return view('post::Admin.Pages.CategorySearch', compact('categoryList'));
    }
}
