<x-admin-master>
    @section('content')
        <a class="text-decoration-none text-reset" href="{{ url()->previous() }}">&larr; Back</a>
        <h1 class="text-center">Job Applications</h1>
        @if (session('success'))
            <div class=" form-group text-center">
                <strong class="text-success">{{ session('success') }}</strong>
            </div>
        @elseif(session('deleted'))
            <div class=" form-group text-center">
                <strong class="text-danger">{{ session('deleted') }}</strong>
            </div>
        @endif
        {{-- @if (count($applications) > 0) --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="adminApplications" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Application Id</th>
                                <th>User Name</th>
                                <th>Job Title</th>
                                <th>Father name</th>
                                <th>Mother name</th>
                                <th>Contact No</th>
                                <th>Email</th>
                                <th>Gender</th>
                                <th>Category</th>
                                <th>educational details</th>
                                <th>DOB</th>
                                <th>Payment status
                                    <input type="checkbox" id="completed" name="Completed">
                                    <small style="font-weight: bold">completed only</small>
                                </th>
                                <th>Profile image</th>
                            </tr>
                        </thead>
                        

                        {{-- <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->id }}</td>
                                    <td><a
                                            href="{{ route('users.show', $application->user) }}">{{ $application->user->name }}</a>
                                        <p>click here to view user applications</p>
                                    </td>
                                    <td>{{ $application->job->title }}</td>
                                    <td>{{ $application->father_name }}</a></td>
                                    <td>{{ $application->mother_name }}</td>
                                    <td>{{ $application->user->phone }}</td>
                                    <td>{{ $application->user->email }}</td>
                                    <td>{{ $application->user->gender }}</td>
                                    <td>{{ $application->category }}</td>
                                    <td>{{ $application->educational_details }}</td>
                                    <td>{{ $application->user->dob }}</td>
                                    <td>
                                        @if ($application->payment != null)
                                            Completed
                                        @else
                                            Pending
                                        @endif
                                    </td>
                                    <td><img height="100"
                                            src="{{ asset('storage/images/' . $application->user->profile_image) }}"
                                            alt="Image unavailable"></td>
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
                {{ $applications->links() }}
            </div>
        </div> --}}
    @endsection
</x-admin-master>
