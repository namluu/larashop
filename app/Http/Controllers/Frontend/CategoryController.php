<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category->doesntExist()) {
            return back()->withErrors([
                'message' => 'Page does not exist.',
            ]);
        }
        return view('frontend.category.show', [
            'category' => $category
        ]);
    }
}
