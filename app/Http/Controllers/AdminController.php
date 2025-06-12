<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function login(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'password' => 'required|string|min:3',
        ]);

        $admin = Admin::where('name', $request->name)->first();

        if (!$admin || $request->password !== $admin->password) {
            return back()->withErrors(['login' => 'Invalid username or password']);
        }

        Session::put('admin', $admin);
        return redirect('dashboard');
    }

    public function dashboard()
    {
        $admin = Session::get('admin');


        if (!$admin) {
            return redirect('admin-login')->withErrors(['session' => 'Please login first']);
        }

        return view('admin', ['name' => $admin->name]);
    }


    function categories()
    {
        $categories = Category::get();
        $admin = Session::get('admin');


        if (!$admin) {
            return redirect('admin-login')->withErrors(['session' => 'Please login first']);
        }

        return view('categories', ['name' => $admin->name, 'categories' => $categories]);
    }

    function logout()
    {
        Session::forget('admin');
        return redirect('admin-login');
    }

    function addCategory(Request $request)
    {

        $request->validate([
            'category' => 'required|string|max:255|unique:categories,name'
        ]);

        $admin = Session::get('admin');
        $category = new Category();
        $category->name = $request->category;
        $category->creator = $admin->name;

        if ($category->save()) {
            Session::flash('category', 'Category ' . $request->category . ' added successfully.');
        } else {
            Session::flash('category', 'Failed to add category. Please try again.');
        }
        return redirect('admin-categories');
    }

    function deleteCategory($id)
    {
        $isDelete = Category::find($id)->delete();

        if ($isDelete) {
            Session::flash('category', 'Category Deleted successfully');
        }
        return redirect('admin-categories');
    }

    function addQuiz()
    {
        $categories = Category::get();
        $admin = Session::get('admin');


        if (!$admin) {
            return redirect('admin-login')->withErrors(['session' => 'Please login first']);
        } else {
            $quizName = request('quiz');
            $category_id = request('category_id');
            if($quizName && $category_id && !Session::has('quizDetails')){
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category_id;
                if($quiz->save()){
                    Session::put('quizDetails',$quiz);
                }
            }
        }

        return view('add-quiz', ['name' => $admin->name, 'categories' => $categories]);
    }
}
