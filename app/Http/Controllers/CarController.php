<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarGallery;
use App\Models\Owner;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class CarController extends Controller
{
    public function display($name, Request $request){
        $file=storage_path('app/'.$name);
        return response()->file($file);
    }
    public function carImage($carId){
        $carGallery=CarGallery::find($carId);
        $file=storage_path('app/car_gallery/'.$carGallery->image);
        return response()->file($file);
    }

    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        $owners=Owner::all();
        $cars= Car::all();
        return view("cars.index",['cars'=>$cars, 'owners'=>$owners, 'users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners=Owner::all();

        return view('cars.create', ['owners'=>$owners]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'reg_number'=>['required','alpha_num','min:6','max:6','unique:App\Models\Car,reg_number'],
            'brand'=>['required', 'min:3', 'max:64'],
            'model'=>['required', 'min:3', 'max:64']
        ],[
            'reg_number.*'=>'Registracijos numeris privalo būtį 6 simbolių.',
            'brand.*'=>'Privalomą užpildytį šį lauką, min 3 simboliai, max 64 simboliai.',
            'model.*'=>'Privalomą užpildytį šį lauką, min 3 simboliai, max 64 simboliai.'
        ]);

        $car=new Car();
        $car->id=$request->id;
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {

        $owners=Owner::all();
        return view('cars.show', ['car'=>$car, 'owners'=>$owners]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {

        $owners=Owner::all();
        return view('cars.update',['car'=>$car, 'owners'=>$owners]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
//            'reg_number'=>['required','min:6','max:6','unique:App\Models\Car,reg_number'],
            'brand'=>['required', 'min:3', 'max:64'],
            'model'=>['required', 'min:3', 'max:64']
        ],[
            'reg_number.*'=>'Registracijos numeris privalo būtį 6 simbolių.',
            'brand.*'=>'Privalomą užpildytį šį lauką, min 3 simboliai, max 64 simboliai.',
            'model.*'=>'Privalomą užpildytį šį lauką, min 3 simboliai, max 64 simboliai.'
        ]);
        $car->reg_number=$request->reg_number;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $img=$request->file('image');
        $filename=$car->id.'.'.$img->extension();
        $car->img=$filename;
        $img->storeAs('cars',$filename );
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }

    public function showCars(){
        $cars= Car::all();
        return view("cars",['cars'=>$cars]);

    }
}
