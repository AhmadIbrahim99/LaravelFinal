<?php

namespace App\Http\Controllers\APIs;

use App\Campuse;
use App\Http\Controllers\Controller;
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

        return response()->json([
            'status' => true,
            'campuses' => $campuses,
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
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'address' => 'nullable',
            'school_id' => 'required',

        ]);


        $inputs = $request->all();

        $campuse = Campuse::create($inputs);

        if ($campuse) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully created campuse !',
                'campuse' => $campuse,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Campuse $campuse
     * @return \Illuminate\Http\Response
     */
    public function show(Campuse $campuse)
    {

        return response()->json([
            'status' => true,
            'campuse' => $campuse,
        ], 200);
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
        $validatedData = $request->validate([

            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            //'phone' => 'nullable|regex:/(01)[0-9]{9}', // check the input starts with 01 and is followed by 9 numbers.
            'address' => 'nullable',
            'school_id' => 'required',

        ]);


        $inputs = $request->all();
        $campuse = Campuse::findOrFail($campuse_id);
        //dd($inputs);
        $updated = $campuse->update($inputs);

        //dd($updated );

        if ($updated) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully updated campuse !',
                'campuse' => $campuse,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Campuse $campuse
     * @return \Illuminate\Http\Response
     */
    public function destroy($campuse_id)
    {
        //return $campuse_id;
        $campuse = Campuse::findOrFail($campuse_id);
        $campuse->delete();
        return response()->json([
            'status' => true,
            'message' => 'Successfully deleted campuse !',
        ], 200);
    }
}
