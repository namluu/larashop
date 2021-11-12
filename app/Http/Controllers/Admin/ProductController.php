<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductFormRequest;
use App\Http\Services\ProductService;
use App\Http\Services\MenuService;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productService;

    protected $menuService;

    public function __construct(ProductService $productService, MenuService $menuService)
    {
        $this->productService = $productService;
        $this->menuService = $menuService;
    }

    public function index()
    {
        return view('admin.product.index', [
            'products' => $this->productService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.product.create', [
            'menus' => $this->menuService->getAllHierarchy()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductFormRequest $request)
    {
        $this->productService->create($request);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            'product' => $product,
            'menus' => $this->menuService->getAllHierarchy()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductFormRequest $request
     * @param  Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Product $product, ProductFormRequest $request)
    {
        $this->productService->update($product, $request);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $result = $this->productService->destroy($request);
        return response()->json($result);
    }
}
