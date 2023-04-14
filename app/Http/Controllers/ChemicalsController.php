<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\Datatables;
use Illuminate\Http\Request;
use App\Models\Chemicals;
use Illuminate\Support\Facades\DB;

class ChemicalsController extends Controller
{
    public function addChemicals(Request $request)
    {
        $chemicals = new Chemicals;
        $chemicals->date_requested = $request->date_requested;
        $chemicals->date_to_be_used = $request->date_to_be_used;
        $chemicals->chemical_name = $request->chemical;
        $chemicals->quantity = $request->quantity;
        $chemicals->requested_by = $request->requested_by;
        $chemicals->prepared_by = $request->prepared_by;
        $chemicals->save();

        return redirect()->route('chemicals');
        // return $chemicals;
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $chemicals = Chemicals::get()->all();
                return Datatables::of($chemicals)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                        return $actionBtn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('chemicals');

    }
}
