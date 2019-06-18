<?php

namespace App\Http\Controllers\Admin;


use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;


class ArticleController extends Controller
{

    public function index(Request $request)
    {
        session_start();
        if(isset($_SESSION['user']))
        {
            if($_SESSION['user'] !== 'admin')
            {
                return redirect()->to('admin');
            }
        }
        else {
            return redirect()->to('admin');
        }
        $sort = trim($request->input('sort'));
        $sort = in_array($sort, ['created_at']) ? $sort : 'created_at';
        $order = Input::get('order') === 'asc' ? 'asc' : 'desc';

        $articles = Article::orderBy($sort,$order)->paginate(15);

        // load the view and pass the articles
        return View::make('admin.articles')->with(
            [
                'articles' => $articles,
                //'request'=> $request,
            ]);
    }

    public function create(Request $request)
    {
        session_start();
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] !== 'admin') {
                return redirect()->to('admin');
            }
        } else {
            return redirect()->to('admin');
        }

        return View::make('admin.create')
            ->with(compact('request'));


    }

    public function store()
    {
        // validate
        $rules = array(
            'author' => 'required',
            'description' => 'required',
            'name' => 'required',

        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            session_start();
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['author'] = $_POST['author'];
            $_SESSION['description'] = $_POST['description'];
            return Redirect::to('articles/create')
                ->withErrors($validator);
        } else {
            // store
            $article = new Article();
            $article->name = Input::get('name');
            $article->author = Input::get('author');
            $article->description = Input::get('description');
            $article->save();
            // redirect
            Session::flash('message', 'Successfully created Job!');
            return Redirect::to('articles');
        }
    }

    public function edit($id, Request $request)
    {
        session_start();
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] !== 'admin') {
                return redirect()->to('admin');
            }
        } else {
            return redirect()->to('admin');
        }
        $article = Article::find($id);
        return View::make('admin.edit')
            ->with('article', $article)
            ->with('request', $request);

    }

    public function update($id, Request $request)
    {
        $rules = array(
            'author' => 'required',
            'description' => 'required',
            'name' => 'required',

        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('articles/edit/' . $id)
                ->withErrors($validator);
        } else {
            $article = Article::findOrFail($id);
            $article->name = Input::get('name');
            $article->author = Input::get('author');
            $article->description = Input::get('description');
            //$article->created_at = Input::get('created_at');
            $article->save();
            // redirect
            Session::flash('message', 'Successfully updated Job!');
            return Redirect::to('articles');
        }
    }

    public function delete($id)
    {
        Article::destroy($id);
        //DB::table('articles')->where('id', $id)->delete();
        return redirect()->to('articles');
    }

    public function show($id)
    {
        session_start();
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] !== 'admin') {
                return redirect()->to('admin');
            }
        } else {
            return redirect()->to('admin');
        }
        $article = Article::where('id', '=', $id)->first();
        return View::make('admin.show')->with('article', $article);
    }
    public function showCreate(){
        session_start();
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] !== 'admin') {
                return redirect()->to('admin');
            }
        } else {
            return redirect()->to('admin');
        }
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $author = isset($_POST['client']) ? $_POST['client'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : null;
        $created_at = isset($_POST['created_at']) ? $_POST['created_at'] : null;
        $updated_at = isset($_POST['updated_at']) ? $_POST['updated_at'] : null;
        return view('admin.showCreate')->with(
            (compact('title','author',
                'description', 'created_at', 'updated_at')));
    }
    public function showEdit(){
        session_start();
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user'] !== 'admin') {
                return redirect()->to('admin');
            }
        } else {
            return redirect()->to('admin');
        }
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $author = isset($_POST['author']) ? $_POST['author'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : null;
        $created_at = isset($_POST['created_at']) ? $_POST['created_at'] : null;
        $updated_at = isset($_POST['updated_at']) ? $_POST['updated_at'] : null;
        return view('admin.showEdit')->with(
            (compact('title','author',
                'description', 'created_at', 'updated_at')));
    }
}