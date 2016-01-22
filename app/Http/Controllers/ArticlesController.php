<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only'=>'create']);
    }
    public function index()
    {
    	$articles = Article::latest('published_at')->published()->get();
    	return view('articles.index',compact('articles'));
    }
    public function show($article)
    {
    	//dd($id);
    	//$article = Article::findOrFail($id);

    	//dd($article->published_at);
    	return view('articles.show',compact('article'));
    }

    public function create()
    {

    	return view('articles.create');
    }

    public function store(ArticleRequest $request)//Request $request)
    {
    	// $this->validate($request,['title'=>'required','body'=>'required']);
        $article = new Article($request->all());
        Auth::user()->articles()->save($article);
    	return redirect('articles');
    }

    public function edit($id)
    {
    	$article = Article::findOrFail($id);
    	return view('articles.edit',compact('article'));
    }

    public function update($id,ArticleRequest $request)
    {
    	$article = Article::findOrFail($id);

    	$article->update($request->all());

    	return redirect('articles');
    }
}
