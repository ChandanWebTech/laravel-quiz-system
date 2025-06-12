<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Mcq;
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
        $totalMCQs = 0;


        if (!$admin) {
            return redirect('admin-login')->withErrors(['session' => 'Please login first']);
        } else {
            $quizName = request('quiz');
            $category_id = request('category_id');
            if ($quizName && $category_id && !Session::has('quizDetails')) {
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category_id;
                if ($quiz->save()) {
                    Session::put('quizDetails', $quiz);
                }
            } else {
                $quiz = Session::get('quizDetails');
                $totalMCQs = $quiz && Mcq::where('quiz_id', $quiz->id)->count();
            }
        }

        return view('add-quiz', ['name' => $admin->name, 'categories' => $categories, 'totalMCQs' => $totalMCQs]);
    }

    function addMcqs(Request $request)
    {

        $request->validate([
            "question" => "required|min:5",
            "a" => "required",
            "b" => "required",
            "c" => "required",
            "d" => "required",
            "correct_ans" => "required|in:a,b,c,d",

        ]);


        $mcq = new Mcq();
        $quiz = Session::get('quizDetails');
        $admin = Session::get('admin');
        $mcq->question = $request->question;
        $mcq->a = $request->a;
        $mcq->b = $request->b;
        $mcq->c = $request->c;
        $mcq->d = $request->d;
        $mcq->correct_ans = $request->correct_ans;

        $mcq->admin_id = $admin->id;
        $mcq->quiz_id = $quiz->id;
        $mcq->category_id = $quiz->category_id;

        if ($mcq->save()) {
            if ($request->submit == "add-more") {
                return redirect(url()->previous());
            } else {
                Session::forget('quizDetails');
                return redirect("/admin-categories");
            }
        }
    }

    function endQuizs()
    {
        Session::forget('quizDetails');
        return redirect("/admin-categories");
    }

    function showQuizs($id)
    {
        $admin = Session::get('admin');
         $mcqs = Mcq::where('quiz_id', $id)->get();


        if (!$admin) {
            return redirect('admin-login')->withErrors(['session' => 'Please login first']);
        }

        return view('show-quiz', ['name' => $admin->name, 'mcqs' => $mcqs]);
    }
}
