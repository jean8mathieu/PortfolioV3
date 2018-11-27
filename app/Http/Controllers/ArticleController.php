<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    /**
     * Get the list of article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getList()
    {
        $articles = Article::all();
        return view("admin.article.list", ['articles' => $articles]);
    }

    /**
     * Create an article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCreate()
    {
        return view("admin.article.createUpdate");
    }

    /**
     * Edit an article
     *
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getEdit(Article $article)
    {
        return view("admin.article.createUpdate", ['article' => $article]);
    }

    /**
     * Create or Update the Article into the Database
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function postUpdate(Request $request)
    {
        //If ID exist article exist
        if (isset($request->id) && $request->id > 0) {
            $article = Article::find($request->id);

            if ($article) {
                if ($article->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'short_description' => $request->shortDescription
                ])) {
                    return Response(['error' => false, 'message' => 'Article updated'], 200);
                }
            } else {
                return Response(['error' => true, 'message' => 'Article not found'], 404);
            }
        } else {
            //Create the article
            if (Article::create([
                'title' => $request->title,
                'description' => $request->description,
                'short_description' => $request->shortDescription
            ])) {
                return Response(['error' => false, 'message' => 'Article created'], 200);
            } else {
                return Response(['error' => true, 'message' => 'There was an issue while creating the article'], 404);
            }
        }

        return Response(['error' => true, 'message' => 'Looks like you took the wrong turn...'], 404);
    }
}
