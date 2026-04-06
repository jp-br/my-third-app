@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row mt-5 col-12 px-3">
        <div>
            <a href="{{route('cars.index')}}" class="btn btn-secondary">Back to Car List</a>
        </div>
    </div>
</div>

<div class="container mt-4 ">
    <div class="row px-3">
        <div class="col-12 ">
            <div class="card shadow-md rounded-4 border border-3">
                <div class="card-header bg-dark text-white">
                    <h5>{{ $car->car_name }}</h5>
                </div>

                <div class="card-body p-4">
                    <div class="row g-3 d-flex align-items-center">

                        <div class="col-md-3 text-center mb-3">
                            <img src="https://via.placeholder.com/400" alt="Sample Image" class="img-fluid rounded shadow">
                        </div>

                        <div class="col-md-8">
                            <div class="row g-3">

                                <div class="col-6 col-md-4">
                                    <div class="card h-100 shadow-sm border-0 bg-light">
                                        <div class="card-body">
                                            <h6 class="text-muted mb-1">Car Model</h6>
                                            <p class="mb-0 fw-bold">{{ $car->car_model}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="card h-100 shadow-sm border-0 bg-light">
                                        <div class="card-body">
                                            <h6 class="text-muted mb-1">Color</h6>
                                            <p class="mb-0 fw-bold">{{$car->color}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="card h-100 shadow-sm border-0 bg-light">
                                        <div class="card-body">
                                            <h6 class="text-muted mb-1">Mileage</h6>
                                            <p class="mb-0 fw-bold">{{ $car->mileage}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="card h-100 shadow-sm border-0 bg-light">
                                        <div class="card-body">
                                            <h6 class="text-muted mb-1">Year Model</h6>
                                            <p class="mb-0 fw-bold">{{ $car->year_model}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="card h-100 shadow-sm border-0 bg-light">
                                        <div class="card-body">
                                            <h6 class="text-muted mb-1">Amount</h6>
                                            <p class="mb-0 fw-bold">{{ $car->amount}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6 col-md-4">
                                    <div class="card h-100 shadow-sm border-0 bg-light">
                                        <div class="card-body">
                                            <h6 class="text-muted mb-1">Fuel Type</h6>
                                            <p class="mb-0 fw-bold">{{$car->fuel_type}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection