<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\FavoriteDestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{
    public function DestinationPopular()
    {
        $destination = Destination::where('type', 'popular')->where('status', 'active')->get();
        if ($destination) {
            return response()->json(['status' => true, 'Destinations' =>  $destination], 200);
        }
        return response()->json(['status' => false, 'message' => 'Destination not found'], 400);
    }

    public function DestinationMostPopular()
    {
        $destination = Destination::where('type', 'mostpopular')->where('status', 'active')->get();
        if ($destination) {
            return response()->json(['status' => true, 'Destinations' =>  $destination], 200);
        }
        return response()->json(['status' => false, 'message' => 'Destination not found'], 400);
    }

    public function favoriteDestinationNearByHotels(Request $request)
    {
        // Validate the request data
        $request->validate([
            'destination_id' => 'required|exists:destinations,id'
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Check if the destination is a favorite for the user
        $favoriteDestination = FavoriteDestination::where('user_id', $user->id)
                                                  ->where('destination_id', $request->destination_id)
                                                  ->exists();

        if (!$favoriteDestination) {
            return response()->json(['status' => false, 'error' => 'This destination is not in your favorites'], 404);
        }

        // Fetch the destination along with its associated hotels
        $destination = Destination::with(['hotels' => function ($query) {
            $query->select('id', 'name', 'image', 'status', 'destination_id');
        }])->find($request->destination_id);

        // Prepare the response data
        $response = [
            'status' => true,
            'destination' => $destination->name,
            'hotels' => $destination->hotels
        ];

        // Return the formatted response
        return response()->json($response, 200);
    }



}
