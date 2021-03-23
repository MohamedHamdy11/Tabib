<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function categories()
    {
        //$categories = Category::where('parent','=',0)->paginate(); // all categories
         $categories = Category::get()->where('parent','=',0); // all categories
        //$categories = Category::get()->whereNotNull('parent');
       //$categories = Category::paginate()->where( 'parent ', '=', 'null' )->get();


        return response()->json(['status' => 'success','data'=> $categories], 200);
    }

    // get all specialty by category_id 
    public function Specialty(Request $request)
    {
        $Specialty = Category::where('parent','=',$request->id)->paginate(); // category_id
    
        return response()->json(['status' => 'success','data'=> $Specialty], 200);
    }

    /*
    public function SpecialtyDoctor()
    {
        $Specialty = Category::get()->where('parent','=',1); // Doctors
      
        return response()->json(['status' => 'success','data'=> $Specialty], 200);
    }

    public function SpecialtyClinic()
    {
        $Specialty = Category::get()->where('parent','=',2); // Clinics
    
        return response()->json(['status' => 'success','data'=> $Specialty], 200);
    }

    public function SpecialtyHospitalMedicalCenters()
    {
        $Specialty = Category::get()->where('parent','=',3); // HospitalMedicalCenters
    
        return response()->json(['status' => 'success','data'=> $Specialty], 200);
    }

    public function SpecialtyMedicalServices(Request $request)
    {
        $Specialty = Category::where('parent','=',$request->id)->paginate(); // MedicalServices
    
        return response()->json(['status' => 'success','data'=> $Specialty], 200);
    }

    public function SpecialtyPharmaciesMedicalLabs()
    {
        $Specialty = Category::get()->where('parent','=',5); // Pharmacies Medical Labs
    
        return response()->json(['status' => 'success','data'=> $Specialty], 200);
    }
    */



}
