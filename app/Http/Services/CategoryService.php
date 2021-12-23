<?php
namespace App\Http\Services;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryService
{
    public function getAll()
    {
        return Category::orderByDesc('id')->paginate(30);
    }

    public function create($request): bool
    {
        try {
            Category::create([
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
        return Category::where('parent_id', 0)->get();
    }

    public function getAllHierarchy()
    {
        $categories = Category::all();
        $hierarchy = [];
        foreach ($categories as $item) {
            if ($item->parent_id == 0) {
                $hierarchy[$item->id] = ['name' => $item->name, 'children'];
            } else {
                $hierarchy[$item->parent_id]['children'][] = ['id' => $item->id, 'name' => $item->name];
            }
        }
        return $hierarchy;
    }

    public function update($category, $request): bool
    {
        try {
            $category->fill($request->input());
            $category->save();
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
            $category = Category::where('id', $id);
            if ($category->exists()) {
                $category->orWhere('parent_id', $id)->delete();
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
