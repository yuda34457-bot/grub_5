<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function shop()
    {
        $products = \App\Models\Product::where('is_active', true)->get();
        return view('shop.index', compact('products'));
    }

    public function showProduct($id)
    {
        $product = \App\Models\Product::findOrFail($id);
        return view('shop.show', compact('product'));
    }

    public function articles()
    {
        $articles = \App\Models\Article::where('is_published', true)->get();
        return view('articles.index', compact('articles'));
    }

    public function showArticle($id)
    {
        $article = \App\Models\Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
}
