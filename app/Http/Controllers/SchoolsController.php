<?php

namespace App\Http\Controllers;

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

        return view('schools.index', compact('schools'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            //'logo' => 'required|image|dimensions:min_width=100,min_height=100'
            'logo' => 'required'
        ]);

        $inputs = $request->all();

        if ($request->hasFile('logo')) {

            $path = $request->logo->path();
            $extension = $request->logo->extension();

            $upload_file_path = $request->logo->store('images/schools', 'public');
//            $upload_file_path = $request->logo->store('images/schools');
            $inputs['logo'] = $upload_file_path;
        }

        $school = School::create($inputs);
        return redirect()->route('schools.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\School $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        return view('school.edit', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::find($id);
        return view('schools.edit', compact('school'));
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
        $request->validate([

            'name' => 'required',
            'email' => 'required|email',
            //'logo' => 'image|dimensions:min_width=100,min_height=100'
        ]);

        $inputs = $request->all();

        if ($request->hasFile('logo')) {
            $upload_file_path = $request->logo->store('images/schools', 'public');
            $inputs['logo'] = $upload_file_path;
        } else {
            unset($inputs['logo']);
        }

        $updated_school = $school->update($inputs);

        return redirect()->route('schools.index');

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

        return redirect()->route('schools.index');

    }
}
