<x-admin-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back</a>
    <h1 class="text-center">Jobs</h1>
    @if(session('success'))
      <div class=" form-group text-center">
          <strong class="text-success">{{session('success')}}</strong>
      </div>
    @elseif(session('deleted'))
        <div class=" form-group text-center">
          <strong class="text-danger">{{session('deleted')}}</strong>
        </div>
    @endif
    {{-- @if(count($jobs) > 0) --}}
    <!-- Blog Post -->
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="jobs" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%">Id</th>
              <th style="width: 10%">Title</th>
              <th style="width: 10%">Description</th>
              <th style="width: 10%">minimum qualifications</th>
              <th style="width: 3%">minimum age</th>
              <th style="width: 3%">maximum age</th>
              <th style="width: 7%">start date</th>
              <th style="width: 7%">end date</th>
              <th style="width: 7%">exam date</th>
              <th style="width: 7%">No of applicants</th>
              <th>Posted</th>
              <th>Updated</th>
              <th>Actions</th>
            </tr>
          </thead>
          
          {{-- <tbody>
          @foreach($jobs as $job)
            <tr>
              <td>{{$job->id}}</td>
              <td><a href="{{route('jobs.show', $job)}}">{{$job->title}}</a>
            <p style="font-size: 80%;">Click here to view applications for this job</p></td>
              <td>{{$job->description}}</a></td>
              <td>{{$job->minimum_qualification}}</td>
              <td>{{$job->minimum_age}}</td>
              <td>{{$job->maximum_age}}</td>
              <td>{{$job->start_date}}</td>
              <td>{{$job->end_date}}</td>
              <td>{{$job->exam_date}}</td>
              <td>{{$job->applications_count}}</td>
              <td>{{$job->created_at->diffForHumans()}}</td>
              <td>{{$job->updated_at->diffForHumans()}}</td>
              <td>
                <a href="{{route('jobs.edit', $job)}}"><button class="btn btn-outline-primary">Update</button></a>
                <br><br>
                <form method="POST" onsubmit="return confirm('Are you sure want to delete?')" action="{{route('jobs.destroy', $job)}}">
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
        {{$jobs->links()}}
      </div>
    </div> --}}
    @endsection
</x-admin-master>