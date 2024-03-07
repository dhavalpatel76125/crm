<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    public function index()
    {
        return view('admin.courses.index');
    }

    public function coursesDatatable()
    {
        $courses = Course::all();
        return datatables()->of($courses)->make(true);
    }

    //create
    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'duration_hours' => 'required',
            'duration_minutes' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->hours = $request->duration_hours;
        $course->minutes = $request->duration_minutes;
        $course->price = $request->price;
        $course->image = $imageName;
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }



    //edit
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }


    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'duration_hours' => 'required',
            'duration_minutes' => 'required',
        ]);

        $course = Course::findOrFail($id);

        //if image is updated
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $course->image = $imageName;
        }
        $course->name = $request->name;
        $course->description = $request->description;
        $course->hours = $request->duration_hours;
        $course->minutes = $request->duration_minutes;
        $course->price = $request->price;
        $course->save();

        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }


    // show course to user
    public function showallcourses()
    {
        $courses = Course::all();
        return view('admin.courses.allcourses', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.show', compact('course'));
    }
}
