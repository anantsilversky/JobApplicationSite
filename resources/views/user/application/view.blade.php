<x-home-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
    <br><br>
    <h1 class="my-4">Your Applications !</h1>
    @if (session('success'))
    <div class=" form-group text-center">
        <strong>{{ session('success') }}</strong>
    </div>
    @elseif(session('deleted'))
        <div class=" form-group text-center">
            <strong>{{ session('deleted') }}</strong>
        </div>
    @endif
    @if(count($applications) > 0)
        @foreach($applications as $application)

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Job Name {{$application->job->title}}</h2>
                <a href="{{route('applications.show', $application)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Applied {{$application->created_at->diffForHumans()}}
            </div>
        </div>

        @endforeach
    
    @else
    <h3 class="my-4">Currently there are no Applications ! </h3>
    @endif

    <div class="d-flex">
        <div class="mx-auto">
            {{$applications->links()}}
        </div>
    </div>
    @endsection
</x-home-master>