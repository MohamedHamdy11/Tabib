<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\city;

class CityController extends Controller
{
    public function allCity()
    {
        $city = City::paginate(); // all cities
        //$city = City::get(); // all cities 

        return response()->json(['status' => 'success','data'=> $city], 200);
        
    } // end of allCity


}
