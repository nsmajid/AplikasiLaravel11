<?php

namespace App\Http\Controllers\Api;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DivisionResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\DivisionController as ControllersDivisionController;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $divisions =  Division::paginate(20);

        return new DivisionResource(true, 'Data Division', $divisions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'division'   => 'required',
        ]);
        if (!$validator) {
            return response()->json($validator->errors(), 422);
        }
        if ($request->multiple) {
            $dataInsert = [];
            foreach ($request->division as  $value) {
                $dataInsert [] = [
                    'division'=> $value
                ];
            }
             Division::insert($dataInsert);

             $division = $dataInsert;
        } else {
            $division = Division::create([
                'division' => $request->division
            ]);
        }

        return new DivisionResource(true, 'Insert Division', $division);
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        return new DivisionResource(true, 'Single Data', $division);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        $validator = Validator::make($request->all(), [
            'division'   => 'required',
        ]);
        if (!$validator) {
            return response()->json($validator->errors(), 422);
        }

        // $division = Division::where('id',$division->id)->update([
        //     'division' => $request->division
        // ]);

        $division->update([
            'division' => $request->division
        ]);

        return new DivisionResource(true, 'Update Division', $request->division);

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        $division->delete();

        return new DivisionResource(true, 'Delete Division', $division);
    }
}
