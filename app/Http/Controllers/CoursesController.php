<?php

namespace App\Http\Controllers;

use App\Campuse;
use App\Course;
use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('campuse', 'types')->get();
        //$types = $course->types; //  return all types for the spesific course
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campuses = Campuse::all();
        $types = Type::all();
        return view('courses.create', compact('campuses', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
        $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'campuse_id' => 'required',
            'type_ids' => 'required',
        ]);

        $inputs = $request->all();

        $course = Course::create($inputs);

        $typeIds = $request->get('type_ids');

        // convert array of string to array of int
        $typeIdsArray = array_map('intval', $typeIds);

        $course->types()->attach($typeIdsArray);

        return redirect()->route('courses.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $campuses = Campuse::all();
        $types = Type::all();
        //dd($course->types);
        return view('courses.edit', compact('course', 'campuses', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //dd($course);
        //$regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
        $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'campuse_id' => 'required',
            //'type_ids' => 'required',
        ]);

        $inputs = $request->all();

        $updated_course = $course->update($inputs);

        if ($request->has('type_ids')) {
            //dd($request->get('type_ids'));

            $types = $course->types;
            if (!empty($types))
                $course->types()->detach(); // remove the old types

            $typeIds = $request->get('type_ids');

            // convert array of string to array of int
            $typeIdsArray = array_map('intval', $typeIds);

            // then add a new types
            $course->types()->attach($typeIdsArray);
        }

        return redirect()->route('courses.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->types()->detach();
        $course->delete();

        return redirect()->route('courses.index');
    }
}
