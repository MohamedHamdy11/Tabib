<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Favorite;
use App\Vendor;
use App\User;


class FavoriteController extends Controller
{
    // add favorite list
    public function addWishlist(Request $request)
    {
        // $result = Favorite::create([
        //     'user_id'           => auth()->user()->id,
        //     'favoritable_id'    => $request->id,
        //     'created_at'        => Carbon::now()
        // ]);
        $user_id=auth()->user()->id;
        $result = Favorite::create([
            'user_id'           => $user_id,
            'vendor_id'         => $request->vendor_id,
        ]);

        return response()->json(['status'=>'success','message' => 'Successfully created Favorite'], 200);

    } // end of add wishlist


    // delete favorite list
    //public function deleteWishlist(Request $request, Vendor $vendor)
    public function deleteWishlist(Request $request)
    {
        $dele = Favorite::where('vendor_id', $request->vendor_id)->first();
        $dele->delete();
                               
        return response()->json(['message' => 'Successfully deleted Favorite'], 200);
    } // end of delete wish list 

    // get favorite list user
    public function getWishlist()  
    {
        // $result = Favorite::where('user_id', auth()->user()->id)
        //                 ->where('favoritable_id',$request->id)
        //                 ->get();
        //$result = User::wishList()->get();
        $result = Favorite::where('user_id', auth()->user()->id)->with('vendors')->get();

        return response()->json(['status' => 'success','data'=> $result], 200);
    } // end of get wish list


} // end of FavoriteController
