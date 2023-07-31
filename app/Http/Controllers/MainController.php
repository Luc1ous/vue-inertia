<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $articles = Article::latest()->paginate(10)->through(fn($article) => [
            'title' => $article->title,
            'description' => $article->description,
            'slug' => $article->slug,
            'user' => $article->user
        ]);
        return inertia('Index', compact('articles'));
    }

    public function show(Article $article){
        return inertia('Article', compact('article'));
    }

    public function categories(){
        $categories = Category::all();
        return inertia('Categories/Categories', compact('categories'));
    }

    public function showCategory(Category $category){
        $articles = Article::without(['user', 'category'])->where('category_id', $category->id)->paginate(10);
        return inertia('Categories/CategoryArticle', compact(['articles', 'category']));
    }
}
