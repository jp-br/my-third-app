@extends('layouts.app')
@section('content')

<div class="d-flex flex-row m-5 ">

    <div class="col 11">
        <p class="fs-5 fw-bold">Asia Cars</p>
    </div>  

    <div>
        <a class="btn btn-success"  type="button" href="{{ route('cars.create') }}">Create</a>
    </div>
test
</div>
<div class="card d-flex flex-column px-5 overflow-auto "style="max-height:300px;">
    <table class="table table-striped table-dark ">
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



{{-- @foreach ($cars as $car)
    <h1>{{ $car->car_name }}</h1>
@endforeach --}}
@endsection