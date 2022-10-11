<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarGallery;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function display($name, Request $request){
        $file=storage_path('app/'.$name);
        return response()->file($file);
    }
    public function carImage($carId){
        $car=Car::find($carId);
        $file=storage_path('app/cars/'.$car->img);
        return response()->file($file);
    }
    public function carGalleryImage($id){
        $carGallery=CarGallery::find($id);
        $file=storage_path('app/carGallery/'.$carGallery->image);
        return response()->file($file);
    }
}

