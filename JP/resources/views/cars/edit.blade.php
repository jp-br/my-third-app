@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center ">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-3 p-md-4 p-xl-5">
                    <div class="row shadow-sm rounded-4 mb-3">
                        <div class="col-12">
                            <div class="mb-3 text-center">
                                <h2 class="h3">Add Your Car</h2>
                                <h3 class="fs-6 fw-normal text-secondary m-0">Enter your details to Add</h3>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('cars.update', $car->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-floating mb-2">                
                            <input type="text" name="car_name" class="form-control" id="floatingInput" placeholder="Car Name" value="{{ $car->car_name}}">
                            <label for="CarName">Car Name</label>
                        </div>

                        <div class="form-floating mb-2">                
                            <input type="text" name="car_model" class="form-control" id="floatingInput" placeholder="Car Model" value="{{ $car->car_model}}">
                            <label for="CarModel">Car Model</label>
                        </div>

                        <div class="form-floating mb-2">                
                            <input type="text" name="color" class="form-control" id="floatingInput" placeholder="Color" value="{{ $car->color}}">
                            <label for="CarColor">Color</label>
                        </div>

                        
                        <div class="row g-2">
                            <div class="form-floating mb-2 form-group col-md-6 ">
                                <input type="number" name="year_model" class="form-control" id="floatingInput" placeholder="Year Model" value="{{ $car->year_model}}">
                                <label for="YearModel">Year Model</label>
                            </div>
                            <div class="form-floating mb-2 form-group col-md-6 ">                            
                                <input type="number" name="mileage" class="form-control" id="floatingInput" placeholder="Mileage" value="{{ $car->mileage}}">
                                <label for="CarMileage">Mileage</label>
                            </div>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="number" name="amount" class="form-control" id="floatingInput" placeholder="Amount" value="{{ $car->amount}}">
                            <label for="CarAmount">Amount</label>
                        </div>

                        <div class="row g-2">
                            <div class="form-floating mb-2 form-group col-md-6 ">                            
                                <select name="fuel_type" class="form-select" id="formselectfueltype">
                                    <option value="Gasoline" {{ $car->fuel_type == 'Gasoline' ? 'selected' : '' }}>Gasoline</option>
                                    <option value="Electric" {{ $car->fuel_type == 'Electric' ? 'selected' : '' }}>Electric</option>
                                    <option value="Diesel" {{ $car->fuel_type == 'Diesel' ? 'selected' : '' }}>Diesel</option>
                                </select>
                                <label for="CarMileage">Select Fuel Type</label>
                            </div>

                            <div class="form-floating mb-2 form-group col-md-6 ">                            
                                <select name="availability" class="form-select" id="formselectfueltype">
                                    <option value="Available" {{ $car->availability == 'Available' ? 'selected' : '' }}>Available</option>
                                    <option value="Sold" {{ $car->availability == 'Sold' ? 'selected' : '' }}>Sold</option>
                                </select>
                                <label for="CarMileage">Select Fuel Type</label>
                            </div>
                        </div> 
                            
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success w-100" type="submit" href="">Submit</button>
                        </div>
                    </form>
                <div>
            </div>
        </div>
    </div>
</div>


@endsection