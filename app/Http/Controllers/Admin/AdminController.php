<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $user = auth()->user();
        $totalArticles = Article::where('user_id', $user->id)->count();
        return inertia('Admin/Index', compact('totalArticles'));
    }
}
