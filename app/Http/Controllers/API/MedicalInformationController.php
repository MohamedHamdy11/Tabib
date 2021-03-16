<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MedicalInformation;


class MedicalInformationController extends Controller
{
    public function getNotifications()
    {
        return [
            'read'   => auth()->user()->readNotifications,
            'unread' => auth()->user()->unreadNotifications,
        ];
    } // end of getNotification

    public function markAsRead(Request $request)
    {
        return auth()->user()->notifications->where('id', $request->id)->markAsRead();
    } // end of marAsRead


    public function getAllMedicalInformation() 
    {
        $Informations = MedicalInformation::paginate(); // all  Medical Information
        //$Informations = MedicalInformation::get(); // all  Medical Information
        return response()->json(['status' => 'success','data'=> $Informations], 200);
    } // end of get allMedicalInformation

   
    public function oneInformationById(Request $request)
    {
        MedicalInformation::find($request->id)->increment('views');
        $Information = MedicalInformation::where('id','=',$request->id)->paginate(); // Information_id
    
        return response()->json(['status' => 'success','data'=> $Information], 200);
    } // end of oneInformationById

    
}
