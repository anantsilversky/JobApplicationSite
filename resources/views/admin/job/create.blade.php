<x-admin-master>

    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('jobs.store') }}">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>
    
                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" name="title" value="{{ old('title') }}" required autofocus >
    
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
    
                                <div class="col-md-6">
                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" placeholder="Enter description" rows="1" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="qualifications" class="col-md-4 col-form-label text-md-end">Minimum qualifications</label>
    
                                <div class="col-md-6">
                                    <textarea name="minimum_qualification" id="qualifications" class="form-control  @error('qualifications') is-invalid @enderror" placeholder="Enter min qualifications" cols="30" rows="1" required>{{ old('minimum_qualification') }}</textarea>
    
                                    @error('minimum_qualification')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label  class="col-md-4 col-form-label text-md-end">Age range</label>
    
                                <div class="col-md-6">
                                    <input class="form-control @error('minimum_age') is-invalid @enderror" style="width:80px" type="number" name="minimum_age" placeholder="Min" value="{{old('minimum_age')}}">
                                    @error('minimum_age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label>To</label>
                                    <input class="form-control @error('maximum_age') is-invalid @enderror" style="width:80px" type="number" name="maximum_age" placeholder="Max" value="{{old('maximum_age')}}">
                                    @error('maximum_age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="start_date" class="col-md-4 col-form-label text-md-end">Start Date</label>
    
                                <div class="col-md-6">
                                    <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}" name="start_date" required >
    
                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="end_date" class="col-md-4 col-form-label text-md-end">End date</label>
    
                                <div class="col-md-6">
                                    <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" value="{{ old('end_date') }}" name="end_date" required >
    
                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="exam_date" class="col-md-4 col-form-label text-md-end">Exam date</label>
    
                                <div class="col-md-6">
                                    <input id="exam_date" type="date" class="form-control @error('exam_date') is-invalid @enderror" value="{{ old('exam_date') }}" name="exam_date" required >
    
                                    @error('exam_date')
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
</x-admin-master>