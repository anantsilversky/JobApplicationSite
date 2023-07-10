<x-admin-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back</a>
    <h1 class="text-center">Notifications</h1>
    @if(session('success'))
      <div class=" form-group text-center">
          <strong class="text-success">{{session('success')}}</strong>
      </div>
    @elseif(session('deleted'))
        <div class=" form-group text-center">
          <strong class="text-danger">{{session('deleted')}}</strong>
        </div>
    @endif
    {{-- @if(count($notifications) > 0) --}}
    <!-- Blog Post -->
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="adminNotifications" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%">Id</th>
              <th style="width: 5%">Job Title</th>
              <th style="width: 10%">Title</th>
              <th style="width: 10%">Description</th>
              <th style="width: 3%">Actions</th>
            </tr>
          </thead>
          
          {{-- <tbody>
          @foreach($notifications as $notification)
            <tr>
              <td>{{$notification->id}}</td>
              <td><a href="{{route('jobs.show', $notification->job)}}">{{$notification->job->title}}</a>
            <p>click here to view job applications</p></td>
              <td>{{$notification->title}}</td>
              <td>{{$notification->description}}</td>
                <td>
                    <a href="{{route('notifications.edit', $notification)}}"><button class="btn btn-outline-primary">Update</button></a>
                <br><br>
                <form method="POST" onsubmit="return confirm('Are you sure want to delete?')" action="{{route('notifications.destroy', $notification)}}">
                  @method('DELETE')
                  @csrf
                  <button style="width: 78px" class="btn btn-outline-danger">Delete</button>
                </form>
                </td>
            </tr>
          @endforeach
    @else    
    <h3 class="text-center mt-4">Oops, There are no Notifications currently !</h3>    
    @endif    
          </tbody> --}}
        </table>
      </div>
    </div>
    {{-- <div class="d-flex">
      <div class="mx-auto">
        {{$notifications->links()}}
      </div>
    </div> --}}
    @endsection
</x-admin-master>