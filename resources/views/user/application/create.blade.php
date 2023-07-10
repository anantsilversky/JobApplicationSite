<x-home-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back</a>
    <div class="container" style="margin-top: 8%">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card">
                    <div class="card-header">Apply</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('applications.store') }}">
                            @csrf
                            <div class="row mb-3">
                                <label for="father_name" class="col-md-4 col-form-label text-md-end">Job Name</label>
    
                                <div class="col-md-6">
                                    <input id="father_name" type="text" class="form-control"name="" value="{{$job->title}}" readonly >
                                </div>
                            </div>
                            <input type="hidden" value="{{$job->id}}" name="job_id">
                            <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                            <div class="row mb-3">
                                <label for="father_name" class="col-md-4 col-form-label text-md-end">Father Name</label>
    
                                <div class="col-md-6">
                                    <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" placeholder="Enter father's name" name="father_name" value="{{ old('father_name') }}" required autofocus >
    
                                    @error('father_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="mother_name" class="col-md-4 col-form-label text-md-end">Mother Name</label>
    
                                <div class="col-md-6">
                                    <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" placeholder="Enter mother's name" name="mother_name" value="{{ old('mother_name') }}" required autofocus >
    
                                    @error('mother_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="category" class="col-md-4 col-form-label text-md-end">Category</label>
    
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="uc" value="UC" checked>
                                        <label class="form-check-label" for="uc">
                                            UC
                                        </label>
                                    </div>
    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="obc" value="OBC">
                                        <label class="form-check-label" for="obc">
                                            OBC
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="sc" value="SC">
                                        <label class="form-check-label" for="sc">
                                            SC
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="category" id="st" value="ST">
                                        <label class="form-check-label" for="st">
                                            ST
                                        </label>
                                    </div>
    
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="education" class="col-md-4 col-form-label text-md-end">Educational Details</label>
    
                                <div class="col-md-6">
                                    <textarea name="educational_details" id="education" class="form-control" cols="30" rows="1" placeholder="Enter educational details">{{ old('educational_details') }}</textarea>
                                    @error('educational_details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="disability" class="col-md-4 col-form-label text-md-end">Disability</label>
    
                                <div class="col-md-6">
                                    <input id="disability" type="text" class="form-control @error('disability') is-invalid @enderror" placeholder="Enter disability if any" value="{{ old('disability') }}" name="disability" required >
    
                                    @error('disability')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="marriage" class="col-md-4 col-form-label text-md-end">Marriage status</label>
                                
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="marriage_status" id="uc" value="single" checked>
                                        <label class="form-check-label" for="single">
                                            Single
                                        </label>
                                    </div>
    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="marriage_status" id="married" value="married">
                                        <label class="form-check-label" for="married">
                                            Married
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="marriage_status" id="divorced" value="divorced">
                                        <label class="form-check-label" for="divorced">
                                            Divorced
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="marriage_status" id="widows" value="widowed">
                                        <label class="form-check-label" for="widows">
                                            Widow/Widower
                                        </label>
                                    </div>
    
                                    @error('marriage_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>
    
                            <div class="row mb-0 mt-4">
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
</x-home-master>