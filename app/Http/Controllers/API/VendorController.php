<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Vendor;

class VendorController extends Controller
{
    // join us (Join us, 41)
    public function join_us(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'en.name'  => 'required|string',
            'ar.name'  => 'required|string',
            'image'  => 'required|image',
            'category_id'  => 'required',
            'detection_price'  => 'required',
            'en.service'  => 'required|string',
            'ar.service'  => 'required|string',
            'en.address'  => 'required|string',
            'ar.address'  => 'required|string',
            'mobile'  => 'required|string',
            'en.about'  => 'required|string',
            'ar.about'  => 'required|string',
            'email' => 'required|string|email',
            'lat' => 'required|string',
            'lng' => 'required|string'
        ]);

        if($valid->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $valid->errors()
            ], 422);
        } // end of if

        $file_name = $this->saveImage($request->image , 'storage');
        Vendor::create([
            'en' => [
                'name' => $request->en_name
            ],
            'ar' => [
                'name' => $request->ar_name
            ],
            //'name'  => $request->name,
            'image'  => $request->$file_name,
            'category_id'  => $request->category_id, // table categories
            'detection_price'  => $request->detection_price,
            'en' => [
                'service'  => $request->en_service
            ],
            'ar' => [
                'service'  => $request->ar_service
            ],
            //'service'  => $request->service,
            'en' => [
                'address'  => $request->en_address
            ],
            'ar' => [
                'address'  => $request->ar_address
            ],
            //'address'  => $request->address,
            'mobile'     => $request->mobile,
            'en' => [
                'about'   => $request->en_about
            ],
            'ar' => [
                'about'   => $request->ar_about
            ],
            //'about'    => $request->about,
            'email'    => $request->email,
            'lat'      => $request->lat,
            'lng'      => $request->lng
        ]);


        return response()->json(['message' => 'Successfully created user'], 201);

    } // end of join us


    public function saveImage($photo, $folder)
    {
        $file_extension = $photo->getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $photo->move($path,$file_name);

    } // end of saveImage


       // get all vendors by specialty_id
    public function getVendorsSpecialty(Request $request)
    {
        //$Vendors = Vendor::get();
        //$Vendors = Vendor::where('category_id','=',$request->specialtyId)->get();
        $Vendors = Vendor::where('category_id','=',$request->specialtyId)->paginate();

        return response()->json(['status' => 'success','data'=> $Vendors], 200);
    } // end of getVendorsSpecialty


    // get Profile vendor by vendor_id
    public function getVendor(Request $request)
    {
        //$Vendor = Vendor::where('id','=',$request->vendorId)->get();
        //$Vendor = Vendor::where('id','=',$request->vendorId)->get()->with(incrementViewCount);
        //Vendor::with(incrementViewCount);
        //$Vendor = Vendor::where('id','=',$request->vendorId)->increment('views', 1)->paginate();
        Vendor::find($request->vendorId)->increment('views'); 
        $Vendor = Vendor::where('id','=',$request->vendorId)->get();


        return response()->json(['status' => 'success','data'=> $Vendor], 200);
    } // end of getVendor


    // $TheResult = MyModel::where("myFieldOfMyModel", "like", "%" . $name . "%")->get();
    public function getVendoByName(Request $request)
    {
        $Vendor = Vendor::where("name", "like", "%" . $request->name . "%")->paginate();

        return response()->json(['status' => 'success','data'=> $Vendor], 200);
    } // end of getVendor


    public function getVendorByMap(Request $request)
    {
        $vendors = Vendor::where('category_id','=',$request->specialtyId)->paginate();

        // Point Lat and Long
        $pointLat = $request->Userlat;
        $pointLng = $request->Userlng;

        $vendorByMap = [];

        foreach ($vendors as $street) {

            $radius = 5000 * 0.62; // in KM

            $lng_min = $pointLng - $radius / abs(cos(deg2rad($pointLng)) * 69);
            $lng_max = $pointLng + $radius / abs(cos(deg2rad($pointLng)) * 69);
            $lat_min = $pointLat - ($radius / 69);
            $lat_max = $pointLat + ($radius / 69);

            if (($lat_min <= $street['lat'] && $street['lat'] <= $lat_max) && ($lng_min <= $street['lng'] && $street['lng'] <= $lng_max)) {

                    $vendorByMap[] = $street;

            } // end of if

        } // end of foreach
        return response()->json(['status' => 'success','data'=> $vendorByMap], 200);
    } // end of getVendorByMap


}
