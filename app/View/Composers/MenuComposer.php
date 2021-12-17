<?php

namespace App\View\Composers;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $menus = Menu::select('id', 'name', 'parent_id')->where('active', 1)->orderByDesc('id')->get();
        $multipleLevels = [];
        foreach ($menus as $menu) {
            if ($menu->parent_id == 0) {
                $multipleLevels[$menu->id]['parent'] = $menu;
            } else {
                $multipleLevels[$menu->parent_id]['children'][] = $menu;
            }
        }
        $view->with('menus', $multipleLevels);
    }
}