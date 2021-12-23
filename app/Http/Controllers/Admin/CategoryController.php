<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('admin.category.index', [
            'categories' => $this->categoryService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.category.create', [
            'categoryParents' => $this->categoryService->getParents()
        ]);
    }

    public function store(CategoryFormRequest $request): RedirectResponse
    {
        $this->categoryService->create($request);
        return redirect()->back();
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
            'categoryParents' => $this->categoryService->getParents()
        ]);
    }

    public function update(Category $category, MenuFormRequest $request)
    {
        $this->categoryService->update($category, $request);
        return redirect()->route('categories.index');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->categoryService->destroy($request);
        return response()->json($result);
    }
}
