<x-home-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>

    <form action="{{route('users.update', $user)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card mb-4 " style="margin-top: 8%; padding-left:4%; padding-right:4%;">
            <h3 class="text-center" style="margin-top: 5%;">Edit Details </h3>
            <div class="d-flex justify-content-end">
                <label for="image" >
                    <img class="img-profile rounded-circle" height="90" src="{{asset('storage/images/'.$user->profile_image)}}" alt="Image unavailable">
                </label>
            </div>
            <input type="file" id="image" name="profile_image" style="display: none;">
            <cite class="d-flex justify-content-end">click on image to edit</cite>
            @error('image')
            <strong class="text-danger d-flex justify-content-end">{{ $message }}</strong>
            @enderror
            <h5>Name :</h5>
            <input type="text" name="name" required value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong class="d-flex justify-content-end">{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Username :</h5>
            <input type="text" name="username" required value="{{$user->username}}" class="form-control @error('username') is-invalid @enderror">
            @error('username')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Email :</h5>
            <input type="email" name="email" required value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>DOB :</h5>
            <input type="date" name="dob" required value="{{$user->dob}}" class="form-control @error('dob') is-invalid @enderror">
            @error('dob')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Gender :</h5>
            <div class="form-check">
                <input type="radio" name="gender" id="male" value="Male"
                @if($user->gender == 'Male') checked @endif>
                <label class="form-check-label" for="male">
                    Male
                </label>
            </div>

            <div class="form-check">
                <input  type="radio" name="gender" id="female" value="Female" @if($user->gender == 'Female') checked @endif>
                <label class="form-check-label" for="female">
                    Female
                </label>
            </div>
            @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Contact :</h5>
            <input type="number" name="phone" required value="{{$user->phone}}" class="form-control @error('phone') is-invalid @enderror">
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Address :</h5>
            <input type="text" name="address" required value="{{$user->address}}" class="form-control @error('address') is-invalid @enderror">
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>City :</h5>
            <input type="text" name="city" required value="{{$user->city}}" class="form-control @error('city') is-invalid @enderror">
            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <h5>Pincode :</h5>
            <input type="number" name="pincode" required value="{{$user->pincode}}" class="form-control @error('pincode') is-invalid @enderror">
            @error('pincode')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
    
            <div class="card-footer text-muted text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    @endsection
</x-home-master>