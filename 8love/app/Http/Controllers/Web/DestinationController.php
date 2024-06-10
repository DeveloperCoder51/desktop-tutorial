<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::orderBy('created_at', 'DESC')->get();
        return view('web.Destination.index', compact('destinations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('web.Destination.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:destinations,name', // Assuming 'categories' is your table name
            'description' => 'required',
            'image' => 'required'
        ]);

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('Destination'), $imageName);

        $destination = new Destination();
        $destination->image = $imageName;
        $destination->name = $request->name;
        $destination->description = $request->description;
        $destination->save();
        return redirect()->route('destinations.index')->with('success', 'Destination saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $destination = Destination::find($id);
        return view('web.Destination.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image is optional
            'status' => 'required|in:active,block',
            'type' => 'required|in:mostpopular,popular'
        ]);

        // Find the destination or fail if it doesn't exist
        $destination = Destination::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($destination->image && file_exists(public_path('destination/' . $destination->image))) {
                unlink(public_path('destination/' . $destination->image));
            }

            // Upload the new image
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('destination'), $imageName);
            $destination->image = $imageName; // Update the image field
        }

        // Update the destination details
        $destination->name = $request->name;
        $destination->description = $request->description;
        $destination->status = $request->status;
        $destination->type = $request->type;

        // Save the changes to the database
        $destination->save();

        // Redirect to the destinations index route with a success message
        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();
        return redirect()->route('destinations.index')->with('success', 'destination Delete successfully');
    }

    public function block($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->status = 'block';
        $destination->save();
        return redirect()->back()->with('success', 'destination has been successfully Block');
    }
    public function unblock($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->status = 'active';
        $destination->save();
        return redirect()->back()->with('success', 'destination has been successfully Active');
    }
}
