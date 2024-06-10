<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        // Get the currently authenticated user's ID
        $userId = Auth::id();

        // Check if user already has a profile
        if (Profile::where('user_id', $userId)->exists()) {
            return response()->json(['error' => 'User already has a profile'], 409); // Conflict status
        }

        // Define max file size
        $maxFileSize = 100000 * 1024; // 100 MB in bytes

        // Initialize arrays for storing file paths
        $videoPaths = [];
        $imagePaths = [];

        DB::beginTransaction();
        try {
            // Handle video upload
            if ($request->hasFile('video')) {
                $videos = $request->file('video');
                foreach ($videos as $video) {
                    if ($video->getSize() > $maxFileSize) {
                        return response()->json(['error' => 'Video file is too large'], 400);
                    }
                    $videoFileName = Str::random(20) . '.' . $video->getClientOriginalExtension();
                    $video->move(public_path('videos'), $videoFileName);
                    $videoPaths[] = 'videos/' . $videoFileName;
                }
            }

            // Handle image upload
            if ($request->hasFile('image')) {
                $images = $request->file('image');
                foreach ($images as $image) {
                    if ($image->getSize() > $maxFileSize) {
                        return response()->json(['error' => 'Image file is too large'], 400);
                    }
                    $imageName = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('images'), $imageName);
                    $imagePaths[] = 'images/' . $imageName;
                }
            }

            // Save user profile
            $profile = new Profile();
            $profile->video = count($videoPaths) > 0 ? json_encode($videoPaths) : null;
            $profile->image = count($imagePaths) > 0 ? json_encode($imagePaths) : null;
            $profile->user_id = $userId;
            $profile->save();

            // Save user information
            $userInformation = new UserInformation();
            $userInformation->user_id = $userId;
            $userInformation->birthdate = $request->birthdate;
            $userInformation->gender = $request->gender;
            $userInformation->relation_status = $request->relation_status;
            $userInformation->height = $request->height;
            $userInformation->weight = $request->weight;
            $userInformation->looking_for = $request->looking_for;
            $userInformation->about = $request->about;
            $userInformation->location = $request->location;
            $userInformation->interest = $request->interest;
            $userInformation->age = $request->age;
            $userInformation->latitude = $request->latitude;
            $userInformation->longitude = $request->longitude;
            $userInformation->type = $request->type;
            $userInformation->save();

            DB::commit();

            return response()->json(['message' => 'Video, images, and user information uploaded successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to upload due to an error: ' . $e->getMessage()], 500);
        }
    }

}