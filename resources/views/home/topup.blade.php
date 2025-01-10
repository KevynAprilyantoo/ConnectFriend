@extends('layout.home')

@section('content')
    <div class="container p-0 pt-5">

        @if (session('success'))
            <div class="alert alert-success dismissable">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-10 col-xl-8 mx-auto">
                <h1 class="text-center">Balance Topup</h1>
                <p class="lead text-center mb-4">Accsess More Features</p>

                <div class="row py-4">
                    <div class="col-sm-6 mb-3 mb-md-0">
                        <div class="card text-center h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="mb-4">
                                    <h5>Standard</h5>
                                    <span class="display-4">IDR 100.000</span>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('topup.add', 100) }}" class="btn btn-lg btn-primary">Buy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 mb-3 mb-md-0">
                        <div class="card text-center h-100">
                            <div class="card-body d-flex flex-column">
                                <div class="mb-4">
                                    <h5>Premium</h5>
                                    <span class="display-4">IDR 250.000</span>
                                </div>
                                <div class="mt-auto">
                                    <a href="{{ route('topup.add', 1000) }}" class="btn btn-lg btn-primary">Buy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
