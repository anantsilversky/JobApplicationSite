<x-admin-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back</a>
    <h1 class="text-center">Job Application for job "{{$job->title}}"</h1>
    {{-- @if(count($applications) > 0) --}}
    <div id="jobid" data-id="{{$job->id}}"></div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="jobapplications" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%">Application Id</th>
              <th style="width: 10%">User Name</th>
              <th style="width: 10%">Father name</th>
              <th style="width: 10%">Mother name</th>
              <th style="width: 5%">Contact No</th>
              <th style="width: 5%">Email</th>
              <th style="width: 5%">Gender</th>
              <th style="width: 5%">Category</th>
              <th style="width: 3%">educational details</th>
              <th style="width: 3%">DOB</th>
              <th style="width: 3%">Payment status</th>
              <th style="width: 3%">Profile image</th>
            </tr>
          </thead>
          
          {{-- <tbody>
          @foreach($applications as $application)
            <tr>
              <td>{{$application->id}}</td>
              <td><a href="{{route('users.show', $application->user)}}">{{$application->user->name}}</a>
            <p>click here to view user applications</p></td>
              <td>{{$application->father_name}}</a></td>
              <td>{{$application->mother_name}}</td>
              <td>{{$application->user->phone}}</td>
              <td>{{$application->user->email}}</td>
              <td>{{$application->user->gender}}</td>
              <td>{{$application->category}}</td>
              <td>{{$application->educational_details}}</td>
              <td>{{$application->user->dob}}</td>
              <td>
                @if($application->payment != null)
                  Completed
                @else
                  Pending
                @endif
              </td>
              <td><img height="100" src="{{asset('storage/images/'.$application->user->profile_image)}}" alt="Image unavailable"></td>
            </tr>
          @endforeach
    @else    
    <h3 class="text-center mt-4">Oops, There are no Applications currently !</h3>    
    @endif    
          </tbody> --}}
        </table>
      </div>
    </div>
    {{-- <div class="d-flex">
      <div class="mx-auto">
        {{$applications->links()}}
      </div>
    </div> --}}
    @endsection
</x-admin-master>