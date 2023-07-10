<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Contracts\DataTableHtmlBuilder;
use Yajra\DataTables\DataTables;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role->role == 'Admin'){
            return view('admin.job.index');
        }
        $jobs = Job::paginate(10);
        return view('user.job.view', compact('jobs'));
    }

    public function getJobs(){
        return DataTables::of(Job::withCount('applications'))
        ->editColumn('title', function($job){
            return '<a href="'.route('jobs.show', $job).'">'.$job->title.'</a><p>Click here to view applications for this job</p>';
        })
        ->addColumn('action', function($job){
            return '<div class="text-center"><a href="'.route('jobs.edit', $job).'"><i type="button" class=" text-primary fas fa-fw fa-edit"></i></a><form onsubmit=" return confirm(\'Are you sure want to delete ? \')" method="POST" action="'.route('jobs.destroy', $job).'"><input type="hidden" name="_token" value="'. csrf_token().'" /><input type="hidden" name="_method" value="DELETE" /><button type="submit" class="btn btn-link text-danger"><i class="fas fa-fw fa-trash"></i></button></form></div>';
        })
        ->editColumn('created_at', function($job){
            return $job->created_at->diffForHumans();
        })
        ->editColumn('updated_at', function($job){
            return $job->updated_at->diffForHumans();
        })
        ->rawColumns(['title', 'action'])
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role->role == 'Admin'){
            return view('admin.job.create');
        }
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        Job::create($request->all());
        return redirect(route('jobs.index'))->with('success', 'Job created successfully !');
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        if(Auth::user()->isAdmin()){
            // $applications = $job->applications()->with(['user', 'payment'])->paginate(10);
            return view('admin.job.showapplications', compact('job'));
        }
        $job->load(['applications.user', 'fee']);
        return view('user.job.show', compact('job'));
    }

    public function jobApplications($id){
        $job = Job::find($id);
        return DataTables::of($job->applications()->with('user', 'payment'))
        ->addColumn('payment_status', function($application){
            if($application->payment != null){
                return 'completed';
            }else{
                return 'pending';
            }
        })
        ->addColumn('user_name',function($application){
            return '<a href="'.route('users.show', $application->user).'">'.$application->user->name.'</a><p>Click here to view user applications</p>';
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
        ->addColumn('profile_image', function($application){
            return '<img src="'.asset('storage/images/'.$application->user->profile_image).'" alt="Image not available" height = 100 width = 100 >';
        })
        ->filterColumn('user_name', function($query, $keyword){
            $query->whereHas('user', function ($q) use ($keyword) {
                $q->where('name', 'LIKE', '%' . $keyword . '%');
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
        ->rawColumns(['profile_image', 'user_name'])
        ->make(true); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        if(Auth::user()->role->role == 'Admin'){
            return view('admin.job.edit', compact('job'));
        }
        return abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(JobRequest $request, Job $job)
    {
        $job->update($request->all());
        return redirect(route('jobs.index'))->with('success', 'Job updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        if(Auth::user()->role->role == 'Admin'){
            $job->delete();
            return redirect(route('jobs.index'))->with('deleted', 'Job deleted successfully !');
        }
        return abort(403);
    }
}
