<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\SocialMedia;
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
        $article->content = $request->input('editordata');
        $article->about = $request->input('about');

        $article->save();

        /**
         * reassign / insert social media
         */
        $this->reassignSocial($request->all(), $article);

        return redirect()->route('index')->with([
            'message' => 'Rekod berjaya disimpan'
        ]);
    }

    public function reassignSocial($request, $article): void
    {
        $url = $request['url'];
        foreach ($request['jenis'] as $key => $value) {
            $social = new SocialMedia();

            $social->article_id = $article->id;
            $social->jenis = $value;
            $social->url = $url[$key];

            $social->save();
        }
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
        $article = Article::with(['socialMedia'])->where('id', $id)->first();
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
        $article->content = $request->input('editordata');
        $article->about = $request->input('about');
        
        $article->update();

        /**
         * update social media record
         */
        $this->reassignSocialUpdate($request->all(), $article);

        return redirect()->route('index')->with([
            'message' => 'Rekod berjaya dikemaskini'
        ]);
    }

    public function reassignSocialUpdate($request, $article): void
    {
        $url = $request['url'];
        foreach ($request['jenis'] as $key => $value) {
            $social = SocialMedia::where('article_id', $article->id)
                        ->get();
            
            if(empty($social)) continue;

            foreach ($social as $key => $media) {
                // $media->jenis = $value;
                $media->url = $url[$key];

                $media->update();    
            }
        }
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
        $articles = Article::all();
        return view('welcome', ['articles' => $articles]);
    }

    public function read($id)
    {
        /**
         * sql : select * from article inner join social_media
         *         on article.id = social_media.article_id
         *         where article.id = 6
         */
        $article = Article::with([
            'socialMedia'
        ])->where('id', $id)->first();
        
        return view('read', ['article' => $article]);
    }
}
