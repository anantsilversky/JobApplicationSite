<x-home-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back </a>
    <br><br>
    <h1 class="my-4">Your Notifications !</h1>
    <br>
    @if(count($notifications) > 0)
        @foreach ($notifications as $notification)
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{$notification->title}}</h2>
                    <cite>Related to Job "{{$notification->job->title}}"</cite>
                    <br><br>
                    <a href="{{route('notifications.show', $notification)}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Created {{$notification->created_at->diffForHumans()}}
                </div>
            </div>
        @endforeach
    @else
    <h3 class="my-4">Currently there are no Notifications ! </h3>
    @endif
    <div class="d-flex">
        <div class="mx-auto">
            {{$notifications->links()}}
        </div>
    </div>
    @endsection
</x-home-master>