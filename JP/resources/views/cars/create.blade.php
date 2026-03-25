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
                    <form action="{{ route('cars.submit') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-2">                
                            <input type="text" name="car_name" class="form-control" id="floatingInput" placeholder="Car Name">
                            <label for="CarName">Car Name</label>
                        </div>

                        <div class="form-floating mb-2">                
                            <input type="text" name="car_model" class="form-control" id="floatingInput" placeholder="Car Model">
                            <label for="CarModel">Car Model</label>
                        </div>

                        <div class="form-floating mb-2">                
                            <input type="text" name="color" class="form-control" id="floatingInput" placeholder="Color">
                            <label for="CarColor">Color</label>
                        </div>

                        
                        <div class="row g-2">
                            <div class="form-floating mb-2 form-group col-md-6 ">
                                <input type="number" name="year_model" class="form-control" id="floatingInput" placeholder="Year Model">
                                <label for="YearModel">Year Model</label>
                            </div>
                            <div class="form-floating mb-2 form-group col-md-6 ">                            
                                <input type="number" name="mileage" class="form-control" id="floatingInput" placeholder="Mileage">
                                <label for="CarMileage">Mileage</label>
                            </div>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="number" name="amount" class="form-control" id="floatingInput" placeholder="Amount">
                            <label for="CarAmount">Amount</label>
                        </div>

                        <div class="row g-2">
                            <div class="form-floating mb-2 form-group col-md-6 ">                            
                                <select name="fuel_type" class="form-select" id="formselectfueltype">
                                    <option value="1">Gasoline</option>
                                    <option value="2">Electric</option>
                                    <option value="3">Diesel</option>
                                </select>
                                <label for="CarMileage">Select Fuel Type</label>
                            </div>

                            <div class="form-floating mb-2 form-group col-md-6 ">                            
                                <select name="availability" class="form-select" id="formselectfueltype">
                                    <option value="1">Available</option>
                                    <option value="2">Sold</option>
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