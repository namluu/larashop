<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\SliderService;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;

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

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', [
            'slider' => $slider
        ]);
    }

    public function update(Slider $slider, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required'
        ]);
        $this->sliderService->update($slider, $request);
        return redirect()->back();
    }

    public function destroy($request): bool
    {
        try {
            $id = $request->input('id');
            $slider = Slider::where('id', $id);
            if ($slider->exists()) {
                $slider->delete();
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
