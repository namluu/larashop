<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\SliderService;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index()
    {
        return view('admin.slider.index', [
            'sliders' => $this->sliderService->getAll()
        ]);
    }

    public function create()
    {
        return view('admin.slider.create', [
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required'
        ]);
        $this->sliderService->create($request);
        return redirect()->route('sliders.index');
    }
}