<?php

namespace App\Http\Controllers;


// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Carbon\Carbon;
use App\Http\Requests\CreateArticleRequest;

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

    public function store(CreateArticleRequest $request)//Request $request)
    {
    	// $this->validate($request,['title'=>'required','body'=>'required']);

    	Article::create($request->all());

    	return redirect('articles');
    }
}
