<x-home-master>
    @section('content')
    <br>
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
    <br><br>
    <div class="card mb-4 mt-2">
        <div class="card-body">
            <h2 class="card-title">{{$job->title}}</h2>
            <h2>{{$job->description}}</h2>
            <br>
            <h5>Required Qualifications : <span>{{$job->minimum_qualification}}</span></h5>
            <br>
            <h5>Minimum Age : <span>{{$job->minimum_age}}</span></h5>
            <br>
            <h5>Maximum Age : <span>{{$job->maximum_age}}</span></h5>
            <br>
            <h5>Tentative Exam Date : <span>{{$job->exam_date}}</span></h5>
            <br>
            <h5>Applications starting on: <span>{{$job->start_date}}</span></h5>
            <br>
            <h5>Applications ends on : <span>{{$job->end_date}}</span></h5>
            <br>
            <h5>Applications Fee :</h5>
            <strong>General : {{$job->fee->UC}}<br></strong>
            <strong>OBC : {{$job->fee->OBC}}<br></strong>
            <strong>SC : {{$job->fee->SC}}<br></strong>
            <strong>ST : {{$job->fee->ST}}<br></strong>
            <br>
            @if($job->applications->contains('user.id', Auth::user()->id))
            <strong>Already Applied !</strong>
            @else
            <a href="{{route('applications.apply', $job)}}" class="btn btn-primary">Apply</a>
            @endif
        </div>
        <div class="card-footer text-muted">
            Posted {{$job->created_at->diffForHumans()}}
        </div>
    </div>
    @endsection

</x-home-master>