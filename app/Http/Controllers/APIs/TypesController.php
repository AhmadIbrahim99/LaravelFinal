<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return response()->json([
            'status' => true,
            'types' => $types,
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
        ]);

        $inputs = $request->all();

        $type = Type::create($inputs);

        if ($type) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully created a new course type !',
                'type' => $type,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Type $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return response()->json([
            'status' => true,
            'type' => $type,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $inputs = $request->all();

        $updated_type = $type->update($inputs);

        if ($updated_type) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully updated the type !',
                'type' => $type,
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Type $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->courses()->detach();
        $type->delete();

        return response()->json([
            'status' => true,
            'message' => 'Successfully deleted type !',
        ], 200);
    }
}
