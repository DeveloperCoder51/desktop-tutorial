<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FavoriteDestination;
use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;

class FavoriteDestinationController extends Controller
{
    public function addToFavorites(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
        ]);

        $user = Auth::user();
        $destinationId = $request->input('destination_id');

        $favorite = FavoriteDestination::firstOrCreate([
            'user_id' => $user->id,
            'destination_id' => $destinationId,
        ]);

        // $hotels = Hotel::where('destination_id' , $destinationId)->where('status','active')->get();

        return response()->json([
            'status' => true,
            'message' => 'Destination added to favorites',
            'favorite' => $favorite,
            // 'hotel' => $hotels
        ]);
    }

    public function removeFromFavorites(Request $request){
        $request->validate([
           'destination_id' => 'required|exists:destinations,id',
        ]);

        $user = Auth::user();
        $destinationId = $request->input('destination_id');

        $favorite = FavoriteDestination::where('user_id' ,$user->id)->where('destination_id' , $destinationId)->first();

        if($favorite){
            $favorite->delete();
            return response()->json([
               'status' => true,
               'message' => 'Destination removed from favorites',
            ]);
        }

        return response()->json([
           'status' => false,
           'message' => 'Destination not found in favorites',
        ]);
    }


    public function getFavoritesDestination(){
        $user = Auth::user();
         $favorites = FavoriteDestination::select('id','user_id','destination_id','created_at')->where('user_id' ,$user->id)->with(['destination' => function($query){
            $query->select('id','name','image');
            // ->with(['hotels' => function($query){
            //     $query->select('id','destination_id','name','status','image')
            //     ->with(['rooms' => function($query){
            //         $query->select('id','hotel_id','image','status','type','capacity','price');
            //     }]);
            // }]);
        }])
        ->get();
         return $favorites;
    }
}
