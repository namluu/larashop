<?php
namespace App\Http\Services;
use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SliderService
{
    public function getAll()
    {
        return Slider::orderByDesc('sort_order')
            ->paginate(30);
    }

    public function create(Request $request): bool
    {
        try {
            $request->except('_token');
            Slider::create($request->all());
            Session::flash('success', 'Create successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            \Log::info($e->getMessage());
            return false;
        }

        return true;
    }

    public function update(Slider $slider, Request $request)
    {
        try {
            $request->except('_token');
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Updated successfully');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
            return false;
        }

        return true;
    }
}
