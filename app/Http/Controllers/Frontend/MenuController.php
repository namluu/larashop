<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function show($slug)
    {
        $menu = Menu::where('slug', $slug)->first();
        if ($menu->doesntExist()) {
            return back()->withErrors([
                'message' => 'Page does not exist.',
            ]);
        }
        return view('frontend.category.show', [
            'category' => $menu
        ]);
    }
}
