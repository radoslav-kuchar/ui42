<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function index(){
        $cities = City::all();

        return view('city.welcome', compact('cities'));
    }
    public function get(Request $request){
        $data = $request->validate([
            'city_id' => 'required',
        ]);

        $city = City::where('name', $data['city_id'])->first();

        return redirect("/city/{$city->id}");
    }

    public function show(City $city){
        return view('city.show', compact('city'));
    }
}
