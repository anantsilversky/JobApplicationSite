<x-admin-master>
    @section('content')
        <a href="{{url()->previous()}}" class="text-decoration-none text-reset">&larr; Back</a>
        <div class="card mb-8">
            <h3 class="text-center" style="margin-top: 5%">
            <i style="font-size: 60%; margin-right:1%;" class="fas fa-fw fa-lock"></i>
            Account Details 
            <i style="font-size: 50%; margin-left:1%" class="fas fa-fw fa-pen"></i>
            <a class="text-decoration-none" style="font-size: 70%" href="{{route('users.edit', Auth::user())}}">Edit</a>
            </h3>
            
            <div class="text-center">
                <strong class="text-success">{{session('success')}}</strong>
            </div>
            <div class="card-body">
                <div style="display: flex">
                    <div class="card" style="padding-left: 4%; border: none; padding-top: 4%; padding-bottom: 4%; width: 60%">
                        <h4>Name : <span style="font-size: 80%; margin-left:3%">{{Auth::user()->name}}</span></h4>
                        <br>
                        <h4>Username : <span style="font-size: 80%; margin-left:3%">{{Auth::user()->username}}</span></h4>
                        <br>
                        <h4>Email : <span style="font-size: 80%; margin-left:3%">{{Auth::user()->email}}</span></h4>
                        <br>
                        <h4>DOB : <span style="font-size: 80%; margin-left:3%">{{Auth::user()->dob}}</span></h4>
                        <br>
                        <h4>Gender : <span style="font-size: 80%; margin-left:3%">{{Auth::user()->gender}}</span></h4>
                        <br>
                        <h4>Address : <span style="font-size: 80%; margin-left:3%">{{Auth::user()->address}},{{Auth::user()->city}},{{Auth::user()->pincode}}</span></h4>
                        <br>
                        <h4>Contact : <span style="font-size: 80%; margin-left:3%">{{Auth::user()->phone}}</span></h4>
                    </div>
                    <div class="card" style="padding:4%; border: none; ">
                        <img width="400" alt="Image unavailable" src="{{asset('storage/images/'.Auth::user()->profile_image)}}">
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                Created {{Auth::user()->created_at->diffForHumans()}}
                <br>
                Updated {{Auth::user()->updated_at->diffForHumans()}}
            </div>
        </div>
   

    @endsection
</x-admin-master>