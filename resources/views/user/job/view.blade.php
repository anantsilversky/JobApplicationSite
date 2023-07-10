<x-home-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
    <br><br>
    <h1 class="my-4">Active Jobs</h1>
    @if(count($jobs) > 0)
        @foreach($jobs as $job)

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">{{$job->title}}</h2>
                <p class="card-text">{{$job->description}}</p>
                <a href="{{route('jobs.show', $job)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted {{$job->created_at->diffForHumans()}}
            </div>
        </div>

        @endforeach
    
    @else
    <h3 class="my-4">Currently there are no jobs ! </h3>
    @endif

    <div class="d-flex">
        <div class="mx-auto">
            {{$jobs->links()}}
        </div>
    </div>
    @endsection


</x-home-master>