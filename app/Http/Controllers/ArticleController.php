<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\CreateRquest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return[
            new Middleware('permission:view articles', only: ['index']),
            new Middleware('permission:edit articles', only: ['edit']),
            new Middleware('permission:create articles', only: ['create']),
            new Middleware('permission:delete articles', only: ['destory']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRquest $request)
    {
        try {
            if(!empty($request->all())){
                 Article::create([
                    'title' => $request->title,
                    'author' => $request->author,
                    'text' => $request->text,
                ]);
                return to_route('articles.index')->withStatus('The Article has been created');
            }else{
                return to_route('articles.create')->withErrors('Somthing went wrong please fix it..');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Article $article)
    {
        try {
            if(!empty($request->all())){
                 $article->update([
                    'title' => $request->title,
                    'author' => $request->author,
                    'text' => $request->text,
                ]);
                return to_route('articles.index')->withStatus('The Article has been created');
            }else{
                return to_route('articles.create')->withErrors('Somthing went wrong please fix it..');
            }
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        if(!empty($article)){
            $article->delete();
            return redirect()->back()->withStatus('The Article has been deleted');
        }
        return redirect()->back()->withErrors('Something here is worng please check..');

    }
}
