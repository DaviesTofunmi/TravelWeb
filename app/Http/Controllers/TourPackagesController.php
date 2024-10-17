<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourPackages;
use Illuminate\Support\Facades\Storage;

class TourPackagesController extends Controller
{
    //
    public function createTour(Request $request){
        $name= $request->input('name');
        $desc= $request->input('desc');
        $price= $request->input('price');
        $location= $request->input('location');
        $duration= $request->input('duration');
        if($request->hasFile('image')){
            $file = $request->file('image');
            Storage::putFile('tourImages', $file);
            $fileName= time(). '_' . $file->getClientOriginalName();
            $filePath= $file->storeAs('tourImages', $fileName, 'public');

        }
     


        TourPackages::create([
            'name' => $name,
            'desc'=> $desc,
            'price'=>$price,
            'location'=>$location,
            'duration'=> $duration,
            'image'=> $filePath

        ]);
        return response()->json(['message'=>'Package created successfully']);

    }



    public function fetchPackages()
    {
        $packages= TourPackages::all();
        return response()->json($packages);
    }


    public function fetchTourById($id){
        $tour = TourPackages::find($id);
        if($tour){
            return response()->json(["tour" => $tour], 200);

        }
        return response()->json(['message' => 'Tour not found'], 404);
    }
}






