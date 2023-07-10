<x-admin-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('fees.store') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Job title</label>
    
                                <div class="col-md-6">
                                    
                                    <select name="job_id" class="form-control" style="width: 150px" id="" autofocus required>
                                        <option value="">Select Job name</option>
                                        @foreach($jobs as $job)
                                        <option value="{{$job->id}}">{{$job->title}}</option>
                                        @endforeach
                                    </select>

    
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="UC" class="col-md-4 col-form-label text-md-end">UC</label>
    
                                <div class="col-md-6">
                                    <input id="UC" type="number" class="form-control @error('UC') is-invalid @enderror" placeholder="Enter UC fees" name="UC" value="{{ old('UC') }}" required  >
    
                                    @error('UC')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="OBC" class="col-md-4 col-form-label text-md-end">OBC</label>
    
                                <div class="col-md-6">
                                    <input id="OBC" type="number" class="form-control @error('OBC') is-invalid @enderror" placeholder="Enter OBC fees" name="OBC" value="{{ old('OBC') }}" required  >
    
                                    @error('OBC')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="SC" class="col-md-4 col-form-label text-md-end">SC</label>
    
                                <div class="col-md-6">
                                    <input id="SC" type="number" class="form-control @error('SC') is-invalid @enderror" placeholder="Enter SC fees" name="SC" value="{{ old('SC') }}" required  >
    
                                    @error('SC')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>

                            <div class="row mb-3">
                                <label for="ST" class="col-md-4 col-form-label text-md-end">SC</label>
    
                                <div class="col-md-6">
                                    <input id="SC" type="number" class="form-control @error('ST') is-invalid @enderror" placeholder="Enter ST fees" name="ST" value="{{ old('ST') }}" required  >
    
                                    @error('ST')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>
                            
                            
    
                            <div class="row mb-4 mt-0">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</x-admin-master>