<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Services\SliderService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function index()
    {
        return view('frontend.home', [
            'sliders' => $this->sliderService->getAll()
        ]);
    }
}
