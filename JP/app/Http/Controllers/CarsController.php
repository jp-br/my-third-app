<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Cars;
use DB;
use Log;
use Yajra\DataTables\Facades\DataTables;

class CarsController extends Controller
{

    public function index(Request $request){
        Log::info('test');
         $cars = Cars::all(); // get data from database
         return view('cars.index', compact('cars'));
    }

    public function indexShow(Request $request){

        $cars = Cars::latest()->get();

        Log::info($cars);

        return DataTables::of($cars)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
            return '
                <a href="'.route('cars.edit', $row->id).'" class="btn btn-sm btn-primary">Edit</a>
                <a href="'.route('cars.show', $row->id).'" class="btn btn-sm btn-primary">View</a>  
                <a class="btn btn-sm btn-delete btn-danger" data-id="'.$row->id.'">Delete</a>
            ';
        })
        ->rawColumns(['action'])
        ->make(true);


        // return DataTables::of($cars)->make(true);
    }

    // public function index(Request $request){

    //     // $cars = DB ::table('cars')
    //     // ->select('car_model')
    //     // ->where('id',6)
    //     // ->first();
    //     // $cars = DB::table('cars')->select('car_name')->get();
        
    //     //   $cars = DB ::table('cars')
    //     // ->where('year_model','=', '2021')
    //     // ->get();

    //     // DD($cars);
    //     if($request->ajax()){
    //         $cars = Cars::query();

    //        return DataTables::of(cars)->make(true);

    //     }

    //         return view('cars.index');
    // //     $cars = DB::table('cars')->get();
        

    // //     return view('cars.index', [
    // //         'cars' => $cars
    // //     ]);
    // // }

    public function create() {
        return view('cars.create');
    }

    public function submit(Request $request):RedirectResponse {

    Log::info($request);

        $validated = $request->validate([
            'car_name' => 'required',
            'car_model' => 'required',
            'color' => 'required',
            'mileage' => 'required',
            'year_model' => 'required',
            'amount' => 'required',
            'fuel_type' => 'required',
            'availability' => 'required'
         ]);
        // Cars::create([
        //     'car_name' => $validated['car_name'],
        //     'car_model' => $validated['car_model'],
        //     'color' => $validated['car_color'],
        //     'mileage' => $validated['car_mileage'],
        //     'year_model' => $validated['year_model'],
        //     'amount' => $validated['car_amount'],
        //     'fuel_type' => $validated['fuel_type'],
        // ]);
        Cars::create($validated);
        return redirect('cars/index');
    }

    // 'car_name',
    //     'car_model',
    //     'color',
    //     'mileage',
    //     'year_model',
    //     'amount',
    //     'fuel_type',
    //     'transmission',
    //     'availability'

    public function edit($id){
        $car = Cars::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request,$id){

        $car = Cars::findOrFail($id);

        $validated = $request->validate([
            'car_name' => 'required',
            'car_model' => 'required',
            'color' => 'required',
            'mileage' => 'required',
            'year_model' => 'required',
            'amount' => 'required',
            'fuel_type' => 'required',
            'availability' => 'required'
         ]);

         $car->update($validated);

         return redirect('cars/index');
    }

    public function delete($id){
       $car = Cars::findOrFail($id); 
       $car->delete();

        return response()->json(['message' => 'Car deleted successfully']);
    }

    public function show($id){
        $car = Cars::findOrFail($id); 
        
        return view('cars.show', compact('car'));
    }

}
