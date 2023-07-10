<x-home-master>
    @section('content')
    <br>
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
    <br><br>
    <div class="card mb-4 mt-2">
        <div class="card-body">
            <h2 class="card-title">{{$notification->title}}</h2>
            <h4>Related to Job "{{$notification->job->title}}"</h4>
            <br>
            <div class="card" style="padding-top: 2%; padding-left:2%; padding-bottom:2%">
                <h3>Description : </h3>
                <h5><span>{{$notification->description}}</span></h5>
            </div>
        </div>
        <div class="card-footer text-muted">
            Created {{$notification->created_at->diffForHumans()}}
        </div>
    </div>
    @endsection
</x-home-master>