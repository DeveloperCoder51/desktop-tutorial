<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Destination;
use App\Models\SearchTerm;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function HotelFilter(Request $request)
    {
        // dd($request->destination_id);
        // Validate the request data
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'rooms' => 'required|integer|min:1',
        ]);

        $destination = Destination::find($request->destination_id);
        if (!$destination) {
            return response()->json(['status' => false, 'error' => 'No Destination found'], 404);
        }
        // dd($destination);
        $hotels = Hotel::where('destination_id', $request->destination_id)
            ->where('status', 'active')
            ->get();

        if ($hotels->isEmpty()) {
            return response()->json(['status' => false, 'error' => 'No hotels found'], 404);
        }

        $filteredHotels = $hotels->filter(function ($hotel) use ($request) {
            return $hotel->rooms >= $request->rooms;
        });



        return response()->json(['status' => true, 'hotels' => $filteredHotels], 200);
    }


    public function destinationFilter(Request $request)
    {
        $request->validate([
            'search' => 'required|string',
        ]);

        $searchQuery = $request->search;

        $destinations = Destination::where('name', 'like', "%$searchQuery%")->get();

        $hotels = Hotel::with('destination:id,name,image')
            ->where('name', 'like', "%$searchQuery%")
            ->get();

        $results = [
            'destinations' => $destinations,
            'hotels' => $hotels,
        ];

        if ($destinations->isEmpty() && $hotels->isEmpty()) {
            return response()->json(['status' => false, 'error' => 'No destinations or hotels found'], 404);
        }

        if (Auth::check()) {
            $user = Auth::user();
            SearchTerm::create([
                'user_id' => $user->id,
                'term' => $searchQuery,
            ]);
        }

        return response()->json(['status' => true, 'results' => $results], 200);
    }

}
