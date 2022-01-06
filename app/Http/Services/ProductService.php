<?php
namespace App\Http\Services;
use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class ProductService
{
    public function getAll()
    {
        return Product::orderByDesc('id')
            ->leftJoin('categories', 'categories.id', '=', 'products.menu_id')
            ->select('products.*', 'categories.name as menu_name')
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

    public function update(Product $product, ProductFormRequest $request)
    {
        if (!$request->isValid()) return false;

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Updated successfully');
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
            $product = Product::where('id', $id);
            if ($product->exists()) {
                $product->delete();
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
