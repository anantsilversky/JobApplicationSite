<x-home-master>
    @section('content')
    <a class="text-decoration-none text-reset" href="{{url()->previous()}}">&larr; Back</a>
    <div class="container" style="margin-top: 8%">
        <div class="row justify-content-center">
            <div class="col-md-20">
                <div class="card">
                    <div class="card-header">Create Payment</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('payment.store')}}">
                            @csrf
                            <div class="row mb-3">
                                <label for="father_name" class="col-md-4 col-form-label text-md-end">Job Name</label>
    
                                <div class="col-md-6">
                                    <input id="father_name" type="text" class="form-control"name="" value="{{$application->job->title}}" readonly >
                                </div>
                            </div>
                            <input type="hidden" value="{{$application->id}}" name="application_id">
                            <div class="row mb-3">
                                <label for="cardno" class="col-md-4 col-form-label text-md-end">Card No.</label>
    
                                <div class="col-md-6">
                                    <input id="cardno" type="number" class="form-control @error('cardno') is-invalid @enderror" placeholder="1234-1234-1234-1234" name="cardno" value="{{ old('cardno') }}" required autofocus >
    
                                    @error('cardno')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name as per your card" name="name" value="{{ old('name') }}" required >
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="category" class="col-md-4 col-form-label text-md-end">Expiry Date</label>
    
                                <div class="col-md-6">
                                    <input type="text" onfocus="(this.type='month')"   onblur="(this.type='text')"class="form-control @error('expiry') is-invalid @enderror" placeholder="MM/YY" name="expiry" required >
                                    
                                    @error('expiry')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="cvv" class="col-md-4 col-form-label text-md-end">CVV</label>
    
                                <div class="col-md-6">
                                    <input type="number" placeholder="123" name="cvv" value="{{old('cvv')}}" class="form-control @error('cvv') is-invalid @enderror">
                                    @error('cvv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-0 mt-4">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary">
                                        Pay
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