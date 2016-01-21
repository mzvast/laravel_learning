<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
class ArticlesController extends Controller
{
    public function index()
    {
    	$articles = Article::latest('published_at')->published()->get();
    	return view('articles.index',compact('articles'));
    }
    public function show($id)
    {
    	// dd('show');
    	$article = Article::findOrFail($id);

    	dd($article->published_at);
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
    	// Article::create($request->all());

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
