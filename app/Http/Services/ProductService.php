<?php
namespace App\Http\Services;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductService
{
    public function getAll()
    {
        return Product::orderByDesc('id')
            ->leftJoin('menus', 'menus.id', '=', 'products.menu_id')
            ->select('products.*', 'menus.name as menu_name')
            ->paginate(30);
    }

    /**
     * @param  \App\Http\Requests\ProductFormRequest  $request
     */
    public function create($request): bool
    {
        try {
            $request->except('_token');
            Product::create($request->all());
            Session::flash('success', 'Create successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            \Log::info($e->getMessage());
            return false;
        }

        return true;
    }
}
