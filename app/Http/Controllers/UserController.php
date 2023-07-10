<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdmin()){
            // $users = User::where('id', '<>', Auth::user()->id)->paginate(10); 
            return view('admin.user.index');
        }

    }

    public function getUsers(){
        return DataTables::of(User::query()->where('id', '<>', Auth::user()->id))
        ->editColumn('name', function($user){
            return '<a href="'.route('users.show', $user).'">'.$user->name.'</a><p>Click here to view user applications</p>'; 
        })
        ->editColumn('profile_image', function($user){
            return '<img src="storage/images/'.$user->profile_image.'" alt="Image not available" height = 100 width = 100 >';
        })
        ->addColumn('action', function($user){
            return '<div class="text-center"><form onsubmit=" return confirm(\'Are you sure want to delete ? \')" method="POST" action="'.route('users.destroy', $user).'"><input type="hidden" name="_token" value="'. csrf_token().'" /><input type="hidden" name="_method" value="DELETE" /><button type="submit" class="btn btn-link text-danger"><i class="fas fa-fw fa-trash"></i></button></form></div>';
        })
        ->rawColumns(['name', 'profile_image', 'action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if(Auth::user()->isAdmin()){
            return view('admin.user.userapplications', compact('user'));
        }
        
    }

    public function showUserApplications($id){
        $user = User::find($id);
        return DataTables::of($user->applications()->with('job', 'payment', 'user'))
        ->addColumn('profile_image', function($application){
            return '<img src="'.asset('storage/images/'.$application->user->profile_image).'" alt="Image not available" height = 100 width = 100 >';
        })
        ->addColumn('payment_status', function($application){
            if($application->payment != null){
                return 'completed';
            }else{
                return 'pending';
            }
        })
        ->rawColumns(['profile_image'])
        ->make(true);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Auth::user() != $user){
            return abort(403);
        }
        if($user->isAdmin()){
            return view('admin.profile.edit', compact('user'));
        }
        return view('user.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect(route('users.profile',$user))->with('success', 'profile updated successfully !');
    }

    public function profile(User $user){
        if(Auth::user() != $user){
            return abort(403);
        }
        if($user->isAdmin()){ 
            return view('admin.profile.profile');
        }
        return view('user.profile.view', compact('user'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(Auth::user()->isAdmin()){
            $user->delete();
            return redirect(route('users.index'));
        }
        return abort(403);
    }

}