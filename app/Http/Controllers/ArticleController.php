<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Project;
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
        return view('articles.index', [
            'projects' => Project::withCount('articles')->ordered()->get(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(string $project, Article $article, string $slug)
    {
        $article->views += 1;
        $article->save();

        return view('articles.show', [
            'article' => $article,
            'project' => $article->project,
            'category' => $article->category,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string $project
     * @return \Illuminate\Http\Response
     */
    public function showProject(string $project)
    {
        return view('articles.project', [
            'project' => $project = Project::where('slug', $project)->firstOrFail(),
            'categories' => $project->articles()->published()->ordered()->get()->loadMissing('category')->groupBy('category.name'),
        ]);
    }

    /**
     * Search the ressource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $q = $request->input('q');

        return view('articles.search', [
            'articles' => Article::search($q)->get(),
            'q' => $q,
        ]);
    }
}
