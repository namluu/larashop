<?php
namespace App\Http\Services;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function getAll()
    {
        return Menu::orderByDesc('id')->paginate(30);
    }

    public function create($request): bool
    {
        try {
            Menu::create([
                'name' => $request->input('name'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'slug' => Str::slug($request->input('name')),
                'active' => (int) $request->input('active')
            ]);
            Session::flash('success', 'Create successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return false;
        }

        return true;
    }

    public function getParents()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function update($menu, $request): bool
    {
        try {
            $menu->fill($request->input());
            $menu->save();
            Session::flash('success', 'Create successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($request): bool
    {
        try {
            $id = $request->input('id');
            $menu = Menu::where('id', $id);
            if ($menu->exists()) {
                $menu->orWhere('parent_id', $id)->delete();
                Session::flash('success', 'Delete successfully');
                return true;
            }
            Session::flash('error', 'No exist data');
            return false;
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return false;
        }
    }
}
