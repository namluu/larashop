<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuFormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Services\MenuService;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index()
    {
        return view('admin.menu.index', [
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.menu.create', [
            'menuParents' => $this->menuService->getParents()
        ]);
    }

    public function store(MenuFormRequest $request): RedirectResponse
    {
        $this->menuService->create($request);
        return redirect()->route('menus.index');
    }

    public function edit()
    {

    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        return response()->json($result);
    }
}
