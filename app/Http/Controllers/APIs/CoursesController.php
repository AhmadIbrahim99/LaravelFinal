<?php

namespace App\Http\Controllers\APIs;

use App\Course;
use App\Http\Controllers\Controller;
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
        return response()->json([
            'status' => true,
            'courses' => $courses,
        ], 200);
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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'campuse_id' => 'required',
            'type_ids' => 'required',
        ]);

        $inputs = $request->all();

        $course = Course::create($inputs);

        // convert string to array
        $typeIds = explode(',', $inputs['type_ids']);

        // convert array of string to array of int
        $typeIdsArray = array_map('intval', $typeIds);

        $course->types()->attach($typeIdsArray);

        if ($course) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully created a new course !',
                'course' => $course,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {

        return response()->json([
            'status' => true,
            'course' => $course,
        ], 200);
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
        $validatedData = $request->validate([
            'name' => 'required|string',
            'price' => 'required',
            'campuse_id' => 'required',
            'type_ids' => 'required',
        ]);

        $inputs = $request->all();

        $updated_course = $course->update($inputs);

        if ($request->has('type_ids')) {
            //dd($request->get('type_ids'));

            $types = $course->types;
            if (!empty($types))
                $course->types()->detach(); // remove the old types

            // convert string to array
            $typeIds = explode(',', $request->get('type_ids'));

            // convert array of string to array of int
            $typeIdsArray = array_map('intval', $typeIds);

            // then add a new types
            $course->types()->attach($typeIdsArray);
        }

        if ($updated_course) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully updated the course !',
                'course' => $course,
            ], 200);
        }
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

        return response()->json([
            'status' => true,
            'message' => 'Successfully deleted course !',
        ], 200);
    }
}
