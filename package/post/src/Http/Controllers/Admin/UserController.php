<?php

namespace Mallcode\Post\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Mallcode\Post\Models\User;
use Mallcode\Post\Models\CategoryModel;

class UserController extends Controller
{
    public function index()
    {
        $user = new User();
        $userList = $user->getAllUsers();

        return view('post::Admin.Pages.User', compact('userList'));
    }

    public function createShow()
    {
        return view('post::Admin.Pages.UserCreate');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|min:8|max:20',
            'userName' => 'required|min:3',
            'dateOfBirth' => 'required|date|date_format:Y-m-d',
        ], [
            'phone.required' => 'You have not entered your phone number',
            'phone.regex' => 'You have entered an invalid phone number format',
            'phone.min' => 'Phone numbers must be at least 10 characters long',
            'password.required' => 'You have not entered your password',
            'password.min' => 'Password must be at least 8 characters long',
            'password.max' => 'Passwords must be no longer than 20 characters',
            'userName.required' => 'You have not entered your user name',
            'userName.min' => 'User name must be at least 3 characters long',
            'dateOfBirth.required' => 'You have not entered your date of birth',
            'dateOfBirth.date' => 'You have entered an invalid date of birth',
            'dateOfBirth.date_format' => 'Date of birth must be in the format YYYY-MM-DD.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User();
        $checkUser = $user->userCheck($request->phone);

        if (!$checkUser) {
            $newUser = new User();

            $newUser->phone = $request->phone;
            $newUser->password = $request->password;
            $newUser->user_name = $request->userName;
            $newUser->gender = $request->gender;
            $newUser->date_of_birth = Carbon::parse($request->dateOfBirth)->format('Y-m-d');
            $newUser->role = $request->role;

            $newUser->save();
            return redirect('admin/user')->with('status', 'Bạn đã thêm tài khoản thành công');
        } else {
            return redirect()->back()->with('error', 'Tài khoản đã tồn tại');
        }
    }

    public function editShow($id)
    {
        $user = new User();
        $userItem = $user->getUserById($id);

        return view('post::Admin.Pages.UserEdit', compact('userItem'));
    }

    public function update(Request $request, $id)
    {
        $user = new User();
        $userItem = $user->getUserById($id);


        $validator = Validator::make($request->all(), [
            'userName' => 'required|min:3',
            'dateOfBirth' => 'required|date|date_format:Y-m-d',
        ], [
            'userName.required' => 'You have not entered your user name',
            'userName.min' => 'User name must be at least 3 characters long',
            'dateOfBirth.required' => 'You have not entered your date of birth',
            'dateOfBirth.date' => 'You have entered an invalid date of birth',
            'dateOfBirth.date_format' => 'Date of birth must be in the format YYYY-MM-DD.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $userItem->user_name = $request->userName;
        $userItem->gender = $request->gender;
        $userItem->date_of_birth = Carbon::parse($request->dateOfBirth)->format('Y-m-d');
        $userItem->role = $request->role;

        $userItem->save();

        return redirect('admin/user/edit/' . $userItem->id)->with('status', 'Cập nhật thành công');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = new User();
        $userItem = $user->getUserById($id);


        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|max:20',
        ], [
            'password.required' => 'You have not entered your password',
            'password.min' => 'Password must be at least 8 characters long',
            'password.max' => 'Passwords must be no longer than 20 characters',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $userItem->password = $request->password;

        $userItem->save();

        return redirect('admin/user/edit/' . $userItem->id)->with('status', 'Cập nhật thành công');
    }

    public function delete($id)
    {
        $user = new User();
        $userItem = $user->getUserById($id);

        $category = new CategoryModel();
        $categoryCheck = $category->categoryCheckUser($id);

        if (isset($categoryCheck) && count($categoryCheck) > 0) {
            return redirect('admin/user/edit/' . $id)->with('error', 'Bạn chưa xóa danh mục chứa người dùng');
        } else {
            $userItem->delete();
            return redirect('admin/user')->with('status', 'Xóa thành công');
        }
    }

    public function search(Request $request)
    {
        $user = new User();
        $userList = $user->userSearch($request->search);

        return view('post::Admin.Pages.UserSearch', compact('userList'));
    }
}
