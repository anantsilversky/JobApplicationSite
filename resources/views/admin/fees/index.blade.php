<x-admin-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back</a>
    <h1 class="text-center">Fee Records</h1>
    @if(session('success'))
      <div class=" form-group text-center">
          <strong class="text-success">{{session('success')}}</strong>
      </div>
    @elseif(session('deleted'))
        <div class=" form-group text-center">
          <strong class="text-danger">{{session('deleted')}}</strong>
        </div>
    @endif
    {{-- @if(count($fees) > 0) --}}
    <!-- Blog Post -->
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="adminFees" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th style="width: 5%">Id</th>
              <th style="width: 5%">Job Title</th>
              <th style="width: 5%">UC</th>
              <th style="width: 5%">OBC</th>
              <th style="width: 5%">SC</th>
              <th style="width: 5%">ST</th>
              <th style="width: 5%">Actions</th>
            </tr>
          </thead>
          
          {{-- <tbody>
          @foreach($fees as $fee)
            <tr>
              <td>{{$fee->id}}</td>
              <td>{{$fee->job->title}}</td>
              <td>{{$fee->UC}}</td>
              <td>{{$fee->OBC}}</td>
              <td>{{$fee->SC}}</td>
              <td>{{$fee->ST}}</td>
                <td>
                    <a href="{{route('fees.edit', $fee)}}"><button class="btn btn-outline-primary">Update</button></a>
                <br><br>
                <form method="POST" onsubmit="return confirm('Are you sure want to delete?')" action="{{route('fees.destroy', $fee)}}">
                  @method('DELETE')
                  @csrf
                  <button style="width: 78px" class="btn btn-outline-danger">Delete</button>
                </form>
                </td>
            </tr>
          @endforeach
    @else    
    <h3 class="text-center mt-4">Oops, There are no Fee records currently !</h3>    
    @endif    
          </tbody> --}}
        </table>
      </div>
    </div>
    {{-- <div class="d-flex">
      <div class="mx-auto">
        {{$fees->links()}}
      </div>
    </div> --}}
    @endsection
</x-admin-master>