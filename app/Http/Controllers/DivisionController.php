<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use App\Exports\DivisionExport;
use App\Exports\DivisionViewExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::with('employee')->get();
        if (request('export') == 'pdf') {
            return $this->downloadPDF($divisions);
        }

        if (request('export') == 'excel') {
            // return Excel::download(new DivisionExport, 'division.xlsx');
            return (new DivisionViewExport($divisions))->download('division.xlsx');
        }

        return view('division.index', [
            'divisions' => $divisions
        ]);
    }

    public function downloadPDF($divisions)
    {

        $pdf = FacadePdf::loadView('division.pdf', [
            'divisions' => $divisions
        ]);

        return  $pdf->download('division.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (request('multiple')) {
            return view('division.create-multiple');
        }
        return view('division.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'division' => 'required'
        ]);

        if (request('multiple')) {
            $dataInsert = [];
            foreach ($request->division as  $value) {
                $dataInsert[] = [
                    'division' => $value
                ];
            }
            $division = Division::insert($dataInsert);
        } else {
            $division = Division::create($data);
        }

        // dd($division);

        if ($division) {
            return redirect('/division')->with('success', 'New Division has been added');
        } else {
            return redirect('/division')->with('error', 'Failed create new Division');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        return view('division.show', [
            'division' => $division
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        return view('division.edit', [
            'division' => $division
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {

        $data = $request->validate([
            'division' => 'required'
        ]);

        $division = Division::where('id', $division->id)->update($data);


        if ($division) {
            return redirect('/division')->with('success', 'New Division has been updated');
        } else {
            return redirect('/division')->with('error', 'Failed update new Division');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        if (Division::destroy($division->id)) {
            return redirect('/division')->with('success', 'Data Division has been deleted');
        } else {


            return redirect('/division')->with('error', 'Failed delete data');
        }
    }
}
