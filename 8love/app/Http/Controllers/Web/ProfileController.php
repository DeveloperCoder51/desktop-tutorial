<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index()
    {
        $users = Auth::user(); // Gets the currently authenticated user
        $friendsCount = $users->friends()->count();
        $likesCount = User::whereHas('likes', function ($query) use ($users) {
            $query->where('liked_user_id', $users->id);
        })->count();
        $matchesCount = User::whereHas('information', function ($query) use ($users) {
            $query->where('country', $users->information->country ?? '')
                ->orWhere('location', $users->information->location ?? '')
                ->orWhere('interest', $users->information->interest ?? '');
        })->count();
        $visitorCount = $users->visits()->count();

        // Get profile data
        $profile = $users->profile;
        $image = json_decode($profile->image ?? '');
        $video = json_decode($profile->video ?? '');
        return view('web.Profile.profile', compact('users', 'profile', 'image', 'video', 'friendsCount', 'likesCount', 'matchesCount', 'visitorCount'));
    }

    public function show()
    {
        $users = Auth::user();

        // Get counts (example code, adjust as necessary)
        $friendsCount = $users->friends()->count();
        $likesCount = User::whereHas('likes', function ($query) use ($users) {
            $query->where('liked_user_id', $users->id);
        })->count();
        $matchesCount = User::whereHas('information', function ($query) use ($users) {
            $query->where('country', $users->information->country ?? '')
                ->orWhere('location', $users->information->location ?? '')
                ->orWhere('interest', $users->information->interest ?? '');
        })->count();
        $visitorCount = $users->visits()->count();

        // Get profile data
        $profile = $users->profile;
        $image = json_decode($profile->image ?? '');
        $video = json_decode($profile->video ?? '');

        return view('web.Profile.show', compact('users', 'profile', 'image', 'video', 'friendsCount', 'likesCount', 'matchesCount', 'visitorCount'));
    }

    public function profile_update(Request $request, $id)
    {
        // Debugging: Log the request data
        \Log::info($request->all());

        // Validate the request data
        $request->validate([
            'birthdate' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'relation_status' => 'required|in:single,married',
            'height' => 'required',
            'weight' => 'required',
            'looking_for' => 'required',
            'about' => 'required',
            'location' => 'required',
            'interest' => 'required',
            'type' => 'required|in:date,business,friendship',
        ]);

        // Fetch the authenticated user
        $user = Auth::user();

        // Update the user_name in the users table
        $user->user_name = $request->input('user_name');
        $user->save();

        // Find or create the associated user information
        $information = $user->information()->firstOrCreate(['user_id' => $user->id]);

        // Fill the user information with the provided data and save it
        $information->fill($request->only([
            'birthdate',
            'gender',
            'relation_status',
            'height',
            'weight',
            'looking_for',
            'about',
            'location',
            'interest',
            'type',
            'age'
        ]));
        $information->save();

        // Redirect to the profile page with a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function image_upload(Request $request)
    {
        $request->validate([
            'image.*' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:5120',
            'video.*' => 'nullable|file|mimes:mp4,mov,avi|max:10240',
        ]);

        // Retrieve the authenticated user's ID
        $user_id = Auth::id();

        // Retrieve the existing profile
        $profile = Profile::where('user_id', $user_id)->first();

        // Decode the existing images and videos if they exist
        $existingImages = $profile ? json_decode($profile->image, true) : [];
        $existingVideos = $profile ? json_decode($profile->video, true) : [];

        $imageNames = [];
        $videoNames = [];

        // Handle image uploads
        if ($request->hasFile('image')) {
            foreach ($request->image as $key => $image) {
                $imageName = time() . '_' . $key . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images'), $imageName);
                $imageNames[] = $imageName;
            }
        }

        // Handle video uploads
        if ($request->hasFile('video')) {
            foreach ($request->video as $key => $video) {
                $videoName = time() . '_' . $key . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('videos'), $videoName);
                $videoNames[] = $videoName;
            }
        }

        // Merge new uploads with existing data
        $finalImageNames = array_merge($existingImages, $imageNames);
        $finalVideoNames = array_merge($existingVideos, $videoNames);

        // Convert arrays of image and video names to JSON format
        $imageNamesJson = json_encode($finalImageNames);
        $videoNamesJson = json_encode($finalVideoNames);

        // Store image and video information in the profile table with user_id
        Profile::updateOrCreate(
            ['user_id' => $user_id],
            ['image' => $imageNamesJson, 'video' => $videoNamesJson]
        );

        return redirect()->back()->with('success', 'Image and Video Upload Success');
    }


    public function deleteMedia(Request $request)
    {
        $request->validate([
            'filename' => 'required|string',
            'type' => 'required|string|in:image,video'
        ]);

        $user_id = Auth::id();
        $profile = Profile::where('user_id', $user_id)->first();

        if (!$profile) {
            return response()->json(['success' => false, 'message' => 'Profile not found.']);
        }

        $media = json_decode($profile->{$request->type}, true);
        if (($key = array_search($request->filename, $media)) !== false) {
            unset($media[$key]);
            $profile->{$request->type} = json_encode(array_values($media)); // re-index array
            $profile->save();

            $filePath = public_path(($request->type === 'image' ? 'images/' : 'videos/') . $request->filename);
            if (file_exists($filePath)) {
                unlink($filePath); // delete the file
            }

            return response()->json(['success' => 'SuccessFully Deleted Media Items']);
        }

        return response()->json(['success' => false, 'message' => ucfirst($request->type) . ' not found.']);
    }

}