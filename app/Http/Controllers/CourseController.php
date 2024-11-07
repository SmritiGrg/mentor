<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\File;
use App\Models\Trainer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with(['category', 'trainers'])->get();
        return view('admin.pages.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CourseCategory::all();
        $trainers = Trainer::all();
        $files = File::all();
        return view('admin.pages.course.create', compact('categories', 'files', 'trainers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);

        $course = new Course();
        $request->validate([
            'image' => 'required|string',
            'name' => 'required|max:100',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|exists:course_categories,id', // Ensure category exists
            'trainer_id' => 'required|exists:trainers,id'
        ]);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->image = $request->image;
        $course->save();
        return redirect('/admin/course')->with('message', 'uploaded Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::query()->where('id', $id)->get()->first();
        $course->delete();
        return redirect('admin/course')->with('message', 'Deleted Successfully');
    }
}
