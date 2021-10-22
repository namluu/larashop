<?php
namespace App\Helpers;

class Menu
{
    public static $a = '';

    /**
     * @deprecated we are using Recursive in blade template
     *
     * @param $menus
     * @param int $parent_id
     * @param string $char
     * @param string $html
     * @return mixed|string
     */
    public static function renderMultiLevels($menus, $parent_id = 0, $char = '', $html = '')
    {
        foreach ($menus as $key => $menu) {
            if ($menu->parent_id == $parent_id) {
                $shortDesc = \Str::of($menu->description)->words(15, '...');
                $linkEdit = route('menus.edit', $menu->id);
                $linkDelete = route('menus.delete');
                $html .= "
                <tr>
                    <td>$menu->id</td>
                    <td>$char $menu->name</td>
                    <td>$shortDesc</td>
                    <td>$menu->active</td>
                    <td>$menu->created_at</td>
                    <td>
                        <a href='$linkEdit'><i class='fas fa-edit'></i></a>&nbsp;|&nbsp;
                        <a href='#' onclick='removeRow($menu->id, $linkDelete)'><i class='fas fa-trash text-danger'></i></a>
                    </td>
                </tr>
                ";
                unset($menus[$key]);
                $html .= self::renderMultiLevels($menus, $menu->id, '--');
            }
        }
        return $html;
    }
}
