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
        // $courses = Course::select('courses.*', 'course_categories.name as category_name', 'trainers.name as trainer_name')
        //     ->join('course_categories', 'courses.category_id', '=', 'course_categories.id')
        //     ->join('trainers', 'courses.trainer_id', '=', 'trainers.id')->with(['category', 'trainers'])
        //     ->get();
        $courses = Course::paginate(5);
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
            'category_id' => 'required', // Ensure category exists
            'trainer_id' => 'required'
        ]);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->image = $request->image;
        $course->category_id = $request->category_id;
        $course->trainer_id = $request->trainer_id;
        $course->save();
        return redirect('/admin/course')->with('message', 'uploaded Succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::query()->where('id', $id)->get()->first();
        return view('admin.pages.Course.view', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $files = File::all();
        $trainers = Trainer::all();
        $categories = CourseCategory::all();
        $course = Course::query()->where('id', $id)->get()->first();
        return view('admin.pages.Course.edit', compact('course', 'files', 'categories', 'trainers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $course = Course::query()->where('id', $id)->get()->first();
        $request->validate([
            'image' => 'required|string',
            'name' => 'required|max:100',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'trainer_id' => 'required'
        ]);
        $course->name = $request->name;
        $course->image = $request->image;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->category_id = $request->category_id;
        $course->trainer_id = $request->trainer_id;
        $course->update();
        return redirect('/admin/course')->with('message', 'Updated Succesfully');
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
