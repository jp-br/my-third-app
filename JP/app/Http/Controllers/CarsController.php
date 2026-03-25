<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Cars;
use DB;
use Log;

class CarsController extends Controller
{
    public function index(){

        // $cars = DB ::table('cars')
        // ->select('car_model')
        // ->where('id',6)
        // ->first();

        $cars = DB::table('cars')->get();
        // $cars = DB::table('cars')->select('car_name')->get();
        
        //   $cars = DB ::table('cars')
        // ->where('year_model','=', '2021')
        // ->get();

        // DD($cars);

        return view('cars.index', [
            'cars' => $cars
        ]);
    }
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

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }

}
