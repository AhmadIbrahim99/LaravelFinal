<?php

namespace App\Http\Controllers;

use App\Campuse;
use App\Http\Controllers\Controller;
use App\School;
use Illuminate\Http\Request;

class CampusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = Campuse::with('school', 'courses')->get();

        return view('campuses.index', compact('campuses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::all();
        return view('campuses.create', compact('schools'));
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
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'school_id' => 'required',
        ]);

        $inputs = $request->all();
        $campuse = Campuse::create($inputs);

        return redirect()->route('campuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Campuse $campuse
     * @return \Illuminate\Http\Response
     */
    public function show(Campuse $campuse)
    {
        return view('campuses.edit', compact('campuse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campuse = Campuse::find($id);
        $schools = School::all();
        return view('campuses.edit', compact('campuse','schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Campuse $campuse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $campuse_id)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            //'phone' => 'nullable|regex:/(01)[0-9]{9}', // check the input starts with 01 and is followed by 9 numbers.
            'address' => 'nullable',
            'school_id' => 'required',

        ]);

        $inputs = $request->all();
        $campuse = Campuse::findOrFail($campuse_id);
        $updated = $campuse->update($inputs);

        return redirect()->route('campuses.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Campuse $campuse
     * @return \Illuminate\Http\Response
     */
    public function destroy($campuse_id)
    {
        $campuse = Campuse::findOrFail($campuse_id);
        $campuse->delete();
        return redirect()->route('campuses.index');

    }
}
