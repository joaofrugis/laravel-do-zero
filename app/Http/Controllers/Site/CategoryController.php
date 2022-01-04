<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('site.category.index', [
            'categories' => Category::all(),
        ]);
    }

    public function show(Category $category)
    {
        return view('site.category.show', ['category' => $category->load('products')]);
    }
}
