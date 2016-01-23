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
        $tags = \App\Tag::lists('name','id');
    	return view('articles.create',compact('tags'));
    }

    public function store(ArticleRequest $request)//Request $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $tagIds = $request->input('tag_list');

        $article->tags()->attach($tagIds);

        flash()->overlay('Your article has been created','Good Job');

    	return redirect('articles');
    }

    public function edit(Article $article)
    {
        $tags = \App\Tag::lists('name','id');
    	return view('articles.edit',compact('article','tags'));
    }

    public function update(Article $article,ArticleRequest $request)
    {
    	//$article = Article::findOrFail($id);

    	$article->update($request->all());

    	return redirect('articles');
    }
}
