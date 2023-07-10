<x-admin-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back</a>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Update</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('fees.update', $fee) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">Job title</label>
                                <div class="col-md-6">
                                    <input type="text" readonly class="form-control" value="{{$fee->job->title}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-form-label text-md-end">UC</label>
    
                                <div class="col-md-6">
                                    <input id="UC" type="number" class="form-control @error('UC') is-invalid @enderror" placeholder="Enter title" name="UC" value="{{$fee->UC}}" required  >
    
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
                                    <input id="OBC" type="number" class="form-control @error('OBC') is-invalid @enderror" placeholder="Enter title" name="OBC" value="{{$fee->OBC}}" required  >
    
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
                                    <input id="SC" type="number" class="form-control @error('SC') is-invalid @enderror" placeholder="Enter title" name="SC" value="{{$fee->SC}}" required  >
    
                                    @error('SC')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="ST" class="col-md-4 col-form-label text-md-end">ST</label>
    
                                <div class="col-md-6">
                                    <input id="ST" type="number" class="form-control @error('ST') is-invalid @enderror" placeholder="Enter title" name="ST" value="{{$fee->ST}}" required  >
    
                                    @error('ST')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-0 mt-4">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        update
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