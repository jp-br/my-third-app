@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.css" />
  


{{--<div class="container">

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
</div> --}}
<div class="container mt-5">
    <div class="row">
        @foreach ($cars as $car)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 ">
                <div class="card p-3 text-center shadow shadow-md rounded-3 border border-2">
                    <h5>{{ $car->car_name }}</h5>
                    <p>{{ $car->color }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

<div class="container">

    <div class="row mt-5 col-12 px-3 ">

        <div class="col-6 ">
            <p class="fs-4 fw-bold justify-content-start ">Asia Cars</p>
        </div>

        <div class="col-6 d-flex justify-content-end py-2">
            <a class="btn btn-success"  type="button" href="{{ route('cars.create') }}">Create</a>
        </div>
        
        
    </div>
        <div class="card-body">
            <div class="card d-flex flex-column p-4 m-4 overflow-auto shadow shadow-md rounded-4 border border-3 " style="height: 500px;">
                <table id="datatable" class="table table-striped datatable">
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
                            <th>Action</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>

</div>
<script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    $('.datatable').DataTable({
        serverSide: true,
        processing: true,
        ajax: {
            url: '{{ route("cars.indexShow") }}'
        },
        columns: [
            { data: 'car_name', name: 'car_name'},
            { data: 'car_model', name: 'car_model'},
            { data: 'color', name: 'color'},
            { data: 'mileage', name: 'mileage'},
            { data: 'year_model', name: 'year_model'},
            { data: 'amount', name: 'amount'},
            { data: 'fuel_type', name: 'fuel_type'},
            { data: 'availability', name: 'availability'},
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

    // Delete handler
    $(document).on('click', '.btn-delete', function(){
        const id = $(this).data('id');

        console.log(id);

        if(confirm('Are you sure you want to delete this car?')){
            $.ajax({
                url: '/cars/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response){
                    alert(response.message);
                    $('.datatable').DataTable().ajax.reload();
                },
                error: function(xhr){
                    alert('Error deleting car. Please try again.');
                    console.error(xhr.responseText);
                }
            });
        }
    });

});
</script>

@endsection 