@extends('layouts.app')
@section('content')


<div class="container">

    <div class="row mt-5 col-12 px-3 ">

        <div class="col-6 ">
            <p class="fs-4 fw-bold justify-content-start ">Asia Cars</p>
        </div>

        <div class="col-6 d-flex justify-content-end py-2">
            <a class="btn btn-success"  type="button" href="{{ route('cars.create') }}">Create</a>
        </div>
        
        
    </div>

    <div class="card d-flex flex-column p-4 m-4 overflow-auto shadow shadow-md rounded-4 border border-3 " style="height: 500px;">
        <table class="table table-striped table-dark" style="max-height:5vh;">
            <thead>
                <tr class="text-center">
                    <th>Car Name</th>
                    <th>Car Model</th>
                    <th>Color</th>
                    <th>Mileage</th>
                    <th>Year Model</th>
                    <th>Amount</th>
                    <th>Fuel Type</th>
                    <th>Availability</th>
                    <th>Button</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->car_name }}</td>
                        <td>{{ $car->car_model}}</td>
                        <td>{{ $car->color}}</td>
                        <td>{{ $car->mileage}}</td>
                        <td>{{ $car->year_model}}</td>
                        <td>{{ $car->amount}}</td>
                        <td>{{ $car->fuel_type}}</td>
                        <td>{{ $car->availability}}</td>
                        <td>
                            <div>
                                <a class="btn m-1 border border-1 border-warning text-warning" type="submit" href="{{ route('cars.edit', $car->id) }}" >Update</a>
                                <form action="{{ route('cars.delete', $car->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this car?');">
                                    @csrf
                                    @method ('delete')
                                    <button 
                                    class="btn border border-1 border-danger text-danger m-1" type="submit">Delete
                                    </button>                              
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach        
            </tbody>
        </table>
    </div>
</div>








{{-- @foreach ($cars as $car)
    <h1>{{ $car->car_name }}</h1>
@endforeach --}}
@endsection