<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Models\Job;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            // $notifications = Notification::with('job')->paginate(10);
            return view('admin.notification.index');
        }
        // $notification = [];
        // $idx = 0;
        // $user = User::where('id', Auth::user()->id)->first();
        // $applications = $user->applications()->get();
        // $user = User::'applications'->where('id' , Auth::user()->id)->get();
        // $notifications = $user->applications;
        // foreach($applications as $application){
        //     $notifications = $application->notifications;
        // }
        $notifications = Notification::whereHas('job.applications', function ($query){
            $query->where('user_id', Auth::user()->id);
        })
        ->with(['job.applications'])->paginate(10);
        return view('user.notifications.view', compact('notifications'));
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
            return view('admin.notification.create', compact('jobs'));
        }
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotificationRequest $request)
    {
        Notification::create($request->all());
        return redirect(route('notifications.index'))->with('success', 'Notification addedd successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        if(Auth::user()->role->role != 'Admin'){
            return view('user.notifications.show', compact('notification'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        if(Auth::user()->isAdmin()){
            return view('admin.notification.edit', compact('notification'));
        }
        return abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        $notification->title = $request->title;
        $notification->description = $request->description;
        if($notification->isDirty()){
            $notification->save();
            return redirect(route('notifications.index'))->with('success', 'Notification updated successfully !');
        }
        return redirect(route('notifications.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        if(Auth::user()->isAdmin()){
            $notification->delete();
            return redirect(route('notifications.index'))->with('deleted', 'Notification deleted successfully !');
        }
        return abort(403);
    }

    public function getAdminNotifications(){
        return DataTables::of(Notification::with('job'))
        ->addColumn('action', function($notification){
            return '<div class="text-center"><a href="'.route('notifications.edit', $notification).'"><i type="button" class=" text-primary fas fa-fw fa-edit"></i></a><form onsubmit=" return confirm(\'Are you sure want to delete ? \')" method="POST" action="'.route('notifications.destroy', $notification).'"><input type="hidden" name="_token" value="'. csrf_token().'" /><input type="hidden" name="_method" value="DELETE" /><button type="submit" class="btn btn-link text-danger"><i class="fas fa-fw fa-trash"></i></button></form></div>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
