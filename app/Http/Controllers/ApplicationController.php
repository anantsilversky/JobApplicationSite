<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\PaymentRequest;
use App\Models\Applications;
use App\Models\Job;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            // $applications = Applications::with(['user', 'job', 'payment'])->paginate(10);
            return view('admin.application.index');
        }
        $applications = Auth::user()->applications()->with('job')->paginate(10);
        return view('user.application.view', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicationRequest $request)
    {
        Applications::create($request->all());
        return redirect(route('applications.index'))->with('success', 'Applied successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Applications $application)
    {
        if(Auth::user()->id == $application->user_id){
            $application->load(['job.fee', 'payment']);
            return view('user.application.show', compact('application'));
        }
        return abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function paymentForm(Applications $application){
        $application->load('job');
        return view('user.payment.form', compact('application'));
    }

    public function payment(PaymentRequest $request, Applications $application)
    {
        Payment::create([
            'application_id' => $request->application_id
        ]);
        return redirect(route('applications.show', Applications::find($request->application_id)))->with('success', 'Payment successfull !');
    }

    public function apply(Job $job){
        return view('user.application.create', compact('job'));
    }

    public function getAdminApplications($id){
        if($id == 1){
            return DataTables::of(Applications::has('payment')->with(['user', 'job', 'payment']))
            ->addColumn('user_name',function($application){
                return '<a href="'.route('users.show', $application->user).'">'.$application->user->name.'</a><p>Click here to view user applications</p>';
            })
            ->addColumn('job_title',function($application){
                return '<a href="'.route('jobs.show', $application->job).'">'.$application->job->title.'</a><p>Click here to view job applications</p>';
            })
            ->addColumn('phone',function($application){
                return $application->user->phone;
            })
            ->addColumn('email',function($application){
                return $application->user->email;
            })
            ->addColumn('gender',function($application){
                return $application->user->gender;
            })
            ->addColumn('dob',function($application){
                return $application->user->dob;
            })
            ->addColumn('payment_status', function($application){
                if($application->payment != null){
                    return 'completed';
                }else{
                    return 'pending';
                }
            })
            ->addColumn('profile_image',function($application){
                return  '<img src="storage/images/'.$application->user->profile_image.'" alt="Profile Image" width="100" height="100">';
            })
            ->filterColumn('user_name', function($query, $keyword){
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('job_title', function($query, $keyword){
                $query->whereHas('job', function ($q) use ($keyword) {
                    $q->where('title', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('phone', function($query, $keyword){
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('phone', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('gender', function($query, $keyword){
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('gender', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('email', function($query, $keyword){
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('email', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('dob', function($query, $keyword){
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('dob', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->rawColumns(['user_name', 'job_title', 'profile_image'])
            ->make(true);
        }else{
            return DataTables::of(Applications::with(['user', 'job', 'payment']))
            ->addColumn('user_name',function($application){
                return '<a href="'.route('users.show', $application->user).'">'.$application->user->name.'</a><p>Click here to view user applications</p>';
            })
            ->addColumn('job_title',function($application){
                return '<a href="'.route('jobs.show', $application->job).'">'.$application->job->title.'</a><p>Click here to view job applications</p>';
            })
            ->addColumn('phone',function($application){
                return $application->user->phone;
            })
            ->addColumn('email',function($application){
                return $application->user->email;
            })
            ->addColumn('gender',function($application){
                return $application->user->gender;
            })
            ->addColumn('dob',function($application){
                return $application->user->dob;
            })
            ->addColumn('payment_status', function($application){
                if($application->payment != null){
                    return 'completed';
                }else{
                    return 'pending';
                }
            })
            ->addColumn('profile_image',function($application){
                return  '<img src="storage/images/'.$application->user->profile_image.'" alt="Profile Image" width="100" height="100">';
            })
            ->filterColumn('user_name', function($query, $keyword){
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('name', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('job_title', function($query, $keyword){
                $query->whereHas('job', function ($q) use ($keyword) {
                    $q->where('title', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('phone', function($query, $keyword){
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('phone', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('gender', function($query, $keyword){
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('gender', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('email', function($query, $keyword){
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('email', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->filterColumn('dob', function($query, $keyword){
                $query->whereHas('user', function ($q) use ($keyword) {
                    $q->where('dob', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->rawColumns(['user_name', 'job_title', 'profile_image'])
            ->make(true);
        }
    }
}
