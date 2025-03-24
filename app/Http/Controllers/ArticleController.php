<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = DB::select('select * from articles');
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }


    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
        ]);
        DB::insert('insert into articles (title, content, author) values (?, ?, ?)', [
            $validated['title'],
            $validated['content'],
            $validated['author'],
        ]);
        return redirect()->route('articles.index')->with('success', 'article created successfully');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }
    public function update(Request $request, Article $article)
    {
        $validated = $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
        ]);
        DB::update('update articles set title = ?, content = ?, author = ? where id = ?', [
            $validated['title'],
            $validated['content'],
            $validated['author'],
            $article->id
        ]);
        return redirect()->route('articles.index')->with('success', 'article updated successfully');
    }
    public function destroy(Article $article)
 {
 DB::delete('delete from articles where id = ?', [$article->id]);
 return redirect()->route('articles.index')->with('success','article deleted successfully');
 }
}
