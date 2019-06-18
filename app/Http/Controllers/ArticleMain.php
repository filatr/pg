<?php

namespace App\Http\Controllers;


use App\Article;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;



class ArticleMain extends Controller {


    public function index(Request $request)
    {
        $sort = trim($request->input('sort'));
        $sort = in_array($sort, ['author']) ? $sort : 'author';
        $order = Input::get('order') === 'asc' ? 'asc' : 'desc';

        $articles = Article::orderBy($sort,$order)->paginate(15);

        // load the view and pass the articles
        return View::make('welcome')->with(
            [
                'articles' => $articles,
                'request'=> $request,
            ]);
    }
    public function search(Request $request){
        $search = $request->get('search');
        $articles = Article::where('author', 'like', '%' .$search. '%')->paginate(4);
        return view('search', ['articles' => $articles]);

    }
    /*public function sortBy(Collectionection $collection){
        $sorted = $collection->sortBy('author');
        return view('search', ['articles' => $articles]);
    }
    public function sortByDesc(Collectionection $collection){
        $sorted = $collection->sortBy('author');
        return view('search', ['articles' => $articles]);
    }*/

}