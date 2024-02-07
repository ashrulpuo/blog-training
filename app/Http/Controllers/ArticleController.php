<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * query to get all data
         * equivelent to sql : select * from article
         */
        $articles = Article::all();
        return view('index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article();

        $article->tajuk = $request->input('tajuk');
        $article->tarikh_publish = $request->input('tarikh_publish');
        $article->penulis = $request->input('penulis');
        $article->kategori = $request->input('kategori');

        $article->save();

        return redirect()->route('index')->with([
            'message' => 'Rekod berjaya disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         * select * from article where id = 1
         */
        $article = Article::find($id);
        return view('edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        $article->tajuk = $request->input('tajuk');
        $article->tarikh_publish = $request->input('tarikh_publish');
        $article->penulis = $request->input('penulis');
        $article->kategori = $request->input('kategori');

        $article->update();

        return redirect()->route('index')->with([
            'message' => 'Rekod berjaya dikemaskini'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * sql : delete article where id = 6
         */
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('index')->with([
            'message' => 'Rekod berjaya dihapus'
        ]);
    }

    public function landing()
    {
        return view('welcome');
    }
}
