<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            // $fees = Fee::with('job')->paginate(10);
            return view('admin.fees.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->isAdmin()){
            $jobs = Job::all();
            return view('admin.fees.create', compact('jobs'));
        }
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fee::create($request->all());
        return redirect(route('fees.index'))->with('success', 'Fees added successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(Fee $fee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee)
    {
        if(Auth::user()->isAdmin()){
            return view('admin.fees.edit', compact('fee'));
        }
        return abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fee $fee)
    {
        $fee->UC = $request->UC;
        $fee->OBC = $request->OBC;
        $fee->SC = $request->SC;
        $fee->ST = $request->ST;
        if($fee->isDirty()){
            $fee->save();
            return redirect(route('fees.index'))->with('success', 'Fees updated successfully !');
        }
        return redirect(route('fees.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fee $fee)
    {
        if(Auth::user()->isAdmin()){
            $fee->delete();
            return redirect(route('fees.index'))->with('deleted', 'Fees deleted successfully !');
        }
        return abort(403);
    }

    public function getAdminFees(){
        return DataTables::of(Fee::with('job'))
        ->addColumn('action', function($fee){
            return '<div class="text-center"><a href="'.route('fees.edit', $fee).'"><i type="button" class=" text-primary fas fa-fw fa-edit"></i></a><form onsubmit=" return confirm(\'Are you sure want to delete ? \')" method="POST" action="'.route('fees.destroy', $fee).'"><input type="hidden" name="_token" value="'. csrf_token().'" /><input type="hidden" name="_method" value="DELETE" /><button type="submit" class="btn btn-link text-danger"><i class="fas fa-fw fa-trash"></i></button></form></div>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
