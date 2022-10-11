<?php

namespace App\Http\Controllers;


use App\Models\CarGallery;
use App\Models\Owner;
use App\Models\User;
use App\Models\Car;
use App\Models\Image;

use Illuminate\Http\Request;

class CarGalleryController extends Controller
{
    public function display($name, Request $request){
        $file=storage_path('app/'.$name);
        return response()->file($file);
    }
    public function carGalleryImage($carId){
        $carGallery=CarGallery::find($carId);
        $file=storage_path('app/carGallery/'.$carGallery->image);
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
        $carGalleries=CarGallery::all();
        return view("car_gallery.index",['carGalleries'=>$carGalleries, 'cars'=>$cars, 'owners'=>$owners, 'users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners=Owner::all();
        $cars=Car::all();
        $carGallery=CarGallery::all();
        return view('car_gallery.create', ['cars'=>$cars,'owners'=>$owners,'car_gallery'=>$carGallery]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $carGallery=new CarGallery();
       // $carGallery->id=$request->id;
        $carGallery->car_id=$request->car_id;
        $carGallery->image=$request->image;
        $carGallery->save();

        $img=$request->file('image');
       //dd($carGallery);
        $filename=$carGallery->id.'.'.$img->extension();

        $carGallery->image=$filename;

        $img->storeAs('carGallery',$filename);
//        $file=storage_path('app/carGallery/'.$carGallery->id);
        $carGallery->save();
        return redirect()->route('cars.show', $carGallery->car_id);
//        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $carGallery)
    {
        $carGallery=CarGallery::all();
        $owners=Owner::all();
        $car=Car::all();
        return view('cars.show', ['car'=>$car, 'owners'=>$owners, 'car_gallery'=>$carGallery->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(CarGallery $carGallery)
    {
        $owners=Owner::all();
        $cars=Car::all();
        return view('car_gallery.update',['car_gallery'=>$carGallery, 'owners'=>$owners, 'cars'=>$cars]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarGallery $carGallery)
    {

        $carGallery->car_id=$request->car_id;
        $carGallery->image=$request->image;
        $img=$request->file('image');
        $filename=$carGallery->car_id.'.'.$img->extension();
        $carGallery->imgage=$filename;
        $img->storeAs('car_gallery',$filename );
        $carGallery->save();
        return redirect()->route('car_gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarGallery $carGallery)
    {
        $carGallery->delete();
        return redirect()->route('car_gallery.index');
    }

    public function showCars(){
        $carGalleries= CarGallery::all();
        return view("car_gallery",['car_gallery'=>$carGalleries]);

    }
}
