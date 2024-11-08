<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Trainer;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // $slider = Sliders::query()->get()->first();
        $courses = Course::query()->get()->all();
        $trainers = Trainer::query()->get()->all();
        // $trainers = Trainer::query()->limit(4);
        return view('mentor.index', compact('courses', 'trainers'));
    }
    public function about()
    {
        return view('mentor.about');
    }
    public function course()
    {
        return view('mentor.courses');
    }
    public function trainer()
    {
        return view('mentor.trainers');
    }
    public function event()
    {
        return view('mentor.events');
    }
    public function contact()
    {
        return view('mentor.contact');
    }
}
