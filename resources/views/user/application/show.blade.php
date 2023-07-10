<x-home-master>
    @section('content')
    <br>
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
    <br><br>
    <div class="card mb-4 mt-2">
        <div class="card-body">
            <h2 class="card-title">Job Name {{$application->job->title}}</h2>
            <h2>{{$application->job->description}}</h2>
            <div class="card-text">
                <br>
                <h5>Father Name : <span>{{$application->father_name}}</span></h5>
                <br>
                <h5>Mother Name : <span>{{$application->mother_name}}</span></h5>
                <br>
                <h5>Category : <span>{{$application->category}}</span></h5>
                <br>
                <h5>Educational Details : <span>{{$application->educational_details}}</span></h5>
                <br>
                <h5>Disability: <span>{{$application->disability}}</span></h5>
                <br>
                <h5>Marriage status : <span>{{$application->marriage_status}}</span></h5>
                <br>
                <h5>Payment :
                    @if($application->payment != null)
                    <strong>Done !</strong>
                    @else
                    <a href="{{route('applications.form', $application)}}" class="btn btn-primary ml-4">Pay Now</a>
                    <cite>Your Fee is <i class="fas fa-rupee-sign"></i> 
                        @if($application->category == 'UC')
                        {{$application->job->fee->UC}}
                        @elseif($application->category == 'OBC')
                        {{$application->job->fee->OBC}}
                        @elseif($application->category == 'SC')
                        {{$application->job->fee->SC}}
                        @else
                        {{$application->job->fee->ST}}
                        @endif.
                    </cite>
                    @endif
                </h5>
            </div>
        </div>
        <div class="card-footer text-muted">
            created {{$application->created_at->diffForHumans()}}
        </div>
    </div>
    @if(session('success'))
    <strong class="text-success">{{session('success')}}</strong>
    @endif
    @endsection
</x-home-master>