<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view("admin.article.list", ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.article.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        print_r($request->all());


        try {
            if (Article::create([
                'title' => $request->title,
                'description' => $request->description,
                'short_description' => $request->shortDescription,
                'user_id' => Auth::user()->id,
                'image-large' => 'http://www.jmdev.ca/v2/img/j-m2.jpg',
                'image-small' => 'http://www.jmdev.ca/v2/img/j-m2.jpg'
            ])) {
                return Response(['error' => false, 'message' => 'Article created'], 200);
            } else {
                return Response(['error' => true, 'message' => 'There was an issue while creating the article'], 500);
            }
        } catch (\Exception $e) {
            return Response(['error' => true, 'message' => 'There was an issue while creating the article. ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return Response(['data' => $article], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view("admin.article.edit", ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        try {
            if ($article->update([
                'title' => $request->title,
                'description' => $request->description,
                'short_description' => $request->shortDescription
            ])) {
                return Response(['error' => false, 'message' => 'Article updated'], 200);
            } else {
                return Response(['error' => true, 'message' => "Article couldn't be updated. Please try again..."], 500);
            }
        } catch (\Exception $e) {
            return Response(['error' => true, 'message' => "Article couldn't be updated. Please try again..."], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        try {
            if ($article->delete()) {
                return Response(['error' => false, 'message' => 'Article Deleted!'], 200);
            } else {
                return Response(['error' => true, 'message' => 'We could not delete the article. Please try again...'], 500);
            }
        } catch (\Exception $e) {
            return Response(['error' => true, 'message' => 'We could not delete the article. Please try again...'], 500);
        }
    }
}
