<?php

namespace Mallcode\Post\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mallcode\Post\Models\CategoryModel;
use Mallcode\Post\Models\PostModel;

class PostController extends Controller
{
    public function index()
    {
        $post = new PostModel();
        $postList = $post->getAllPosts();

        return view('post::Admin.Pages.Post', compact('postList'));
    }

    public function createShow()
    {
        $category = new CategoryModel();

        $categoryList = $category->getCategoryNames();

        return view('post::Admin.Pages.PostCreate', compact('categoryList'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postTitle' => 'required|min:3',
            'postContent' => 'required|min:3',
            'postImage' => 'required|mimes:jpeg,jpg,png,gif,svg,webp',
        ], [
            'postTitle.required' => 'You have not entered your post title',
            'postTitle.min' => 'Post title must be at least 3 characters long',
            'postContent.required' => 'You have not entered your post content',
            'postContent.min' => 'Post content must be at least 3 characters long',
            'postImage.required' => 'You have not entered your post image',
            'postImage.mimes' => 'You have not selected an image file',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $post = new PostModel();
        $postCheck = $post->postCheck($request->postTitle);

        if (!$postCheck) {
            $newPost = new PostModel();

            $newPost->post_title = $request->postTitle;
            $newPost->post_slug = Str::slug($request->postTitle);
            $newPost->post_content = $request->postContent;
            $imgName = $request->postImage->getClientOriginalName();
            $request->postImage->move('images/Admin/Posts', $imgName);
            $newPost->post_image = $imgName;
            $newPost->category_id = $request->categoryId;

            $newPost->save();
            return redirect('admin/post')->with('status', 'Bạn đã thêm bài viết thành công');
        } else {
            return redirect()->back()->with('error', 'Bài viết đã tồn tại');
        }
    }

    public function editShow($id)
    {
        $category = new CategoryModel();
        $categoryList = $category->getCategoryNames();

        $post = new PostModel();
        $postItem = $post->getPostById($id);

        return view('post::Admin.Pages.PostEdit', compact('postItem', 'categoryList'));
    }

    public function update(Request $request, $id)
    {
        $post = new PostModel();
        $postItem = $post->getPostById($id);

        $validator = Validator::make($request->all(), [
            'postTitle' => 'required|min:3',
            'postContent' => 'required|min:3',
            'postImage' => 'mimes:jpeg,jpg,png,gif,svg,webp',
        ], [
            'postTitle.required' => 'You have not entered your post title',
            'postTitle.min' => 'Post title must be at least 3 characters long',
            'postContent.required' => 'You have not entered your post content',
            'postContent.min' => 'Post content must be at least 3 characters long',
            'postImage.mimes' => 'You have not selected an image file',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $postItem->post_slug = Str::slug($request->postTitle);
        $postItem->post_content = $request->postContent;
        if (isset($request->postImage)) {
            $imgName = $request->postImage->getClientOriginalName();
            $request->postImage->move('images/Admin/Posts', $imgName);
            $postItem->post_image = $imgName;
        }
        $postItem->category_id = $request->categoryId;

        $postItem->save();

        return redirect('admin/post/edit/' . $postItem->id)->with('status', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $post = new PostModel();
        $postItem = $post->getPostById($id);
        $postItem->delete();
        return redirect('admin/post')->with('status', 'Xóa thành công');
    }

    public function search(Request $request)
    {
        $post = new PostModel();
        $postList = $post->postSearch($request->search);

        return view('post::Admin.Pages.PostSearch', compact('postList'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();

            $fileName = pathinfo($originName, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);
            return response()->json([
                'fileName' => $fileName, 'uploaded' => 1, 'url' => $url
            ]);
        }
    }
}
