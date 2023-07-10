<x-admin-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back</a>
    <h1 class="text-center">Users</h1>
    @if(session('success'))
    <div class=" form-group text-center">
        <strong class="text-success">{{session('success')}}</strong>
    </div>
    @elseif(session('deleted'))
        <div class=" form-group text-center">
            <strong class="text-danger">{{session('deleted')}}</strong>
        </div>
    @endif
    {{-- @if(count($users) > 0) --}}
    <!-- Blog Post -->
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="applicants" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th style="width: 5%">Id</th>
                <th style="width: 10%">name</th>
                <th style="width: 10%">username</th>
                <th style="width: 10%">email</th>
                <th style="width: 10%">gender</th>
                <th style="width: 3%">phone</th>
                <th style="width: 7%">dob</th>
                <th style="width: 3%">address</th>
                <th style="width: 7%">profile image</th>
                <th style="width: 7%">Actions</th>
            </tr>
            </thead>
            
            {{-- <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="{{route('users.show', $user)}}">{{$user->name}}</a>
            <p style="font-size: 80%;">Click here to view applications for this user</p></td>
                <td>{{$user->username}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->dob}}</td>
                <td>{{$user->address}},<br>{{$user->city}},<br>{{$user->pincode}}</td>
                <td><img height="100" src="{{asset('storage/images/'.$user->profile_image)}}" alt="Image unavailable"></td>
                <td>
                <form method="POST" onsubmit="return confirm('Are you sure want to delete?')" action="{{route('users.destroy', $user)}}">
                    @method('DELETE')
                    @csrf
                    <button style="width: 78px" class="btn btn-outline-danger">Delete</button>
                </form>
                </td>
            </tr>
            @endforeach
    @else    
    <h3 class="text-center mt-4">Oops, There are no Jobs currently !</h3>    
    @endif    
            </tbody> --}}
        </table>
        </div>
    </div>
    {{-- <div class="d-flex">
        <div class="mx-auto">
        {{$users->links()}}
        </div>
    </div> --}}
    @endsection
</x-admin-master>