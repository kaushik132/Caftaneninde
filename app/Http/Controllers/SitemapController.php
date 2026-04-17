<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Product;
use App\Models\Category;

class SitemapController extends Controller
{
       public function index(){
           $blogCategory = BlogCategory::all();
           $blog = Blog::all();
           $product = Product::all();
           $category = Category::all();

        return response()->view('sitemap',[
            'category'=>$category,
            'product'=>$product,
            'blog'=> $blog,
        'blogCategory'=>$blogCategory
        ])->header('Content-Type','text/xml');
    }
}
