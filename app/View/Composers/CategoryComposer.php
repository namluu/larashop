<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $categories = Category::select('id', 'name', 'parent_id', 'slug')->where('active', 1)->orderByDesc('id')->get();
        $multipleLevels = [];
        foreach ($categories as $menu) {
            if ($menu->parent_id == 0) {
                $multipleLevels[$menu->id]['parent'] = $menu;
            } else {
                $multipleLevels[$menu->parent_id]['children'][] = $menu;
            }
        }
        $view->with('categories', $multipleLevels);
    }
}