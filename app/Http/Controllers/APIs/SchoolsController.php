<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\School;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::with('campuse')->get();

        return response()->json([
            'status' => true,
            'schools' => $schools,
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
        $validatedData = $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required|image|dimensions:min_width=100,min_height=100'

        ]);

        $inputs = $request->all();

        if ($request->hasFile('logo')) {
            $upload_file_path = $request->logo->store('images/schools', 'public');
            $inputs['logo'] = $upload_file_path;
        }

        $school = School::create($inputs);

        if ($school) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully created school !',
                'school' => $school,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\School $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {

        return response()->json([
            'status' => true,
            'school' => $school,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\School $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {

        //dd( $request->logo);
        $validatedData = $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'image|dimensions:min_width=100,min_height=100'

        ]);

        $inputs = $request->all();


        if ($request->hasFile('logo')) {
            $upload_file_path = $request->logo->store('images/schools', 'public');
            $inputs['logo'] = $upload_file_path;
        } else {
            unset($inputs['logo']);
        }

        $updated_school = $school->update($inputs);

        if ($updated_school) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully updated school !',
                'school' => $school,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\School $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        // delete the campuse that related to this school
        $school->campuse()->delete();

        // then delete the school
        $school->delete();

        return response()->json([
            'status' => true,
            'message' => 'Successfully deleted school !',
        ], 200);

    }
}
