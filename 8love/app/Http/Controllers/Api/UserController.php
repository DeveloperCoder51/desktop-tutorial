<?php

namespace App\Http\Controllers\Api;

use App\Models\Like;
use App\Models\User;
use App\Models\ProfileVisit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendNewUserNotification;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // regiter api post request
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_name' => $request->user_name,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Dispatch the job to send notifications to all existing users
        SendNewUserNotification::dispatch($user);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully, email notifications are being sent.',
        ], 200);
    }

    // login api post request
    public function login(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Retrieve the user by email
        $user = User::where('email', $request->email)->first();

        // Check if the user is found and if their status is blocked
        if ($user && $user->request_process === 'pending') {
            $response = [
                'success' => false,
                'message' => 'Register Request Not Accept Right Now'
            ];
            return response()->json($response, 403); // Use 403 Forbidden for blocked users
        }
        if ($user && $user->status_to_use_app === 'block') {
            $response = [
                'success' => false,
                'message' => 'User is blocked from using the app'
            ];
            return response()->json($response, 403); // Use 403 Forbidden for blocked users
        }

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user(); // Get the authenticated user

            // Generate a new Sanctum token for the user
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;

            // Prepare the response with the Sanctum token
            $response = [
                'success' => true,
                'token' => $token,
                'first_name' => $user->first_name,
                'message' => 'User logged in successfully'
            ];

            // Return the response
            return response()->json($response, 200);
        } else {
            // If authentication fails, return an unauthorized response
            $response = [
                'success' => false,
                'message' => 'Unauthorized'
            ];
            return response()->json($response, 401);
        }
    }



    // email verify api post request
    public function verifyEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first()
            ]);
        }

        $email = $request->email;

        try {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Email'
                ]);
            }

            // Generate a random 4-digit OTP
            $fourRandomDigit = mt_rand(1000, 9999);

            // Update user's forget_password_code field with the generated OTP
            $user->update(['forget_password_code' => $fourRandomDigit]);

            // Prepare email details
            $details = [
                'title' => 'Mail from Eight Love',
                'code' => $fourRandomDigit
            ];

            // Send email with the OTP
            Mail::send('emails.code', $details, function ($message) use ($email) {
                $message->to($email, 'Verification Code From Love Love')->subject('You have received Verification Code');
                $message->from('info@eightlove.com', 'Verification Code');
            });

            return response()->json([
                'success' => true,
                'message' => 'OTP has been sent to your email',
                'code' => $fourRandomDigit,
                'id' => $user->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.'
            ]);
        }
    }
    //verify otp api post request
    public function verifyOtpAndEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|digits:4',
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first(),
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found with this email address.',
            ]);
        }

        if ($user->forget_password_code != $request->otp) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid OTP for the provided email.',
            ]);
        }

        // Clear the forget_password_code after successful verification (optional)
        $user->forget_password_code = null;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'OTP verified successfully.',
            'user_id' => $user->id,
        ]);
    }
    //change password api post request
    public function changePassword(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'password' => ['required', 'string', 'min:6'], // Add any password validation rules here
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first(),
            ]);
        }

        try {
            // Find the user by user_id
            $user = User::find($request->user_id);

            // Check if user exists
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found with the provided user ID.',
                ]);
            }

            // Update user's password
            $user->password = Hash::make($request->password);
            $user->save();

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Password updated successfully.',
            ]);
        } catch (\Exception $e) {

            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again later.',
            ]);
        }
    }
    // user logout api class post
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'success' => true,
            'message' => 'User Logout successfully.',
        ]);
    }


    // get all user api Get request
    public function AllUsers()
    {
        $users = User::with([
            'profile:id,user_id,image,video',
            'information:id,user_id,gender'
        ])->select('id', 'user_name')->whereNotId(Auth()->id())->get();
        return response()->json($users);
    }
    // get paid user api Get request
    public function PaidUsers()
    {

        $users = User::with([
            'profile:id,user_id,image,video',
            'information:id,user_id,gender'
        ])->select('id', 'user_name')->where('status', 'paid')->get();

        return response()->json($users);
    }
    // get new user api Get request
    public function NewUsers()
    {
        $users = User::with([
            'profile:id,user_id,image,video',
            'information:id,user_id,gender'
        ])->select('id', 'user_name')->orderBy('id', 'DESC')->take(5)->get();
        return response()->json($users);
    }
    public function GetNearby()
    {
        // Get the authenticated user
        $currentUser = auth()->user();

        // Extract latitude and longitude from the information relationship
        $latitude = $currentUser->information->latitude;
        $longitude = $currentUser->information->longitude;

        // Check if latitude and longitude are not empty or null
        if (!empty($latitude) && !empty($longitude)) {
            // Fetch nearby users within 10 km, excluding the current user
            $users = User::select('users.id', 'users.user_name')
                ->join('user_information', 'users.id', '=', 'user_information.user_id')
                ->where('users.id', '!=', $currentUser->id)
                ->selectRaw("
                     users.id,
                     users.user_name,
                     user_information.gender
                 ")
                ->whereRaw("
                     (6371 * acos(cos(radians(?)) * cos(radians(user_information.latitude)) * cos(radians(user_information.longitude) - radians(?)) + sin(radians(?)) * sin(radians(user_information.latitude)))) <= 10
                 ", [$latitude, $longitude, $latitude])
                ->get();

            // Attach profile and information to users
            $users->each(function ($user) {
                $user->profile = [
                    'image' => [],
                    'video' => []
                ];
                $user->information = [
                    'gender' => $user->gender
                ];
                unset($user->gender);
            });

            return response()->json($users);
        } else {
            return response()->json(['error' => 'Latitude ya longitude khali ya null hai.'], 400);
        }
    }



    // add friend api Post Request
    public function addFriend(Request $request, $user)
    {
        $currentUser = auth()->user();

        if (!$currentUser) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        $friend = User::find($user);

        if (!$friend) {
            return response()->json(['error' => 'Invalid friend ID'], 400);
        }
        if ($currentUser->friends()->where('friend_id', $friend->id)->exists()) {
            return response()->json(['error' => 'Already added as friend'], 400);
        }

        $currentUser->friends()->attach($friend->id);

        return response()->json(['message' => 'Friend added successfully']);
    }


    // discover users login user show dairect app suggestionlists
    public function discoverUsers()
    {
        $currentUser = auth()->user();

        if (!$currentUser) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Fetch the IDs of the current user's friends with explicit table reference
        $friendsIds = $currentUser->friends()->select('users.id')->pluck('id');

        // Fetch users who are not friends with the current user and exclude the current user
        // Also match location, country, and gender
        $suggestedUsers = User::with([
            'profile:id,user_id,image,video',
            'information:id,user_id,gender,location'
        ])->select('id', 'user_name', 'country')
            ->whereNotIn('id', $friendsIds)
            ->where('id', '!=', $currentUser->id)
            ->whereHas('information', function ($query) use ($currentUser) {
                $query->where('gender', $currentUser->information->gender);
                // Add more conditions here as needed
            })->get();

        if ($suggestedUsers->isEmpty()) {
            return response()->json(['message' => 'No Users Found'], 404);
        }

        return response()->json($suggestedUsers);
    }




    // filter users post requests
    public function filterUsers(Request $request)
    {
        $currentUser = auth()->user();
        if (!$currentUser) {
            return response()->json(['message' => 'User Not Found'], 404);
        }

        $query = User::with(['information:id,user_id,gender,latitude,longitude', 'profile:id,user_id,image,video']);


        // Gender filter
        $query->whereHas('information', function ($q) use ($request) {
            $q->when($request->gender && $request->gender !== 'both', function ($q) use ($request) {
                $q->where('gender', $request->gender);
            });
        });

        // Type filter
        $query->whereHas('information', function ($q) use ($request) {
            $q->when($request->type && $request->type !== 'business', function ($q) use ($request) {
                $q->where('type', $request->type);
            });
        });

        // Location filter
        if ($request->location) {
            $query->whereHas('information', function ($q) use ($request) {
                $q->where('location', 'LIKE', '%' . $request->location . '%');
            });
        }

        // Age range filter
        if ($request->age && isset($request->age['min']) && isset($request->age['max'])) {
            $minAge = $request->age['min'];
            $maxAge = $request->age['max'];

            // Filter users based on the age range
            $query->whereHas('information', function ($q) use ($minAge, $maxAge) {
                $q->whereBetween('age', [$minAge, $maxAge]);
            });
        }

        // Latitude and Longitude filter
        if ($request->has(['latitude', 'longitude', 'distance'])) {
            $latitude = $request->latitude;
            $longitude = $request->longitude;
            $distance = $request->distance;

            $query->whereHas('information', function ($q) use ($latitude, $longitude, $distance) {
                $q->selectRaw(
                    "6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude))) AS distance",
                    [$latitude, $longitude, $latitude]
                )->having('distance', '<', $distance);
            });
        }

        $query->where('id', '!=', $currentUser->id);
        $users = $query->select('id', 'user_name', 'email')->get();
        return response()->json($users);
    }




    // like users in the database
    public function likeUser(Request $request)
    {
        $currentUser = auth()->user();
        $likedUserId = $request->input('liked_user_id');

        if ($currentUser->id == $likedUserId) {
            return response()->json(['message' => 'You can not like yourself'], 400);
        }
        // Check if the like already exists
        $existingLike = Like::where('user_id', $currentUser->id)
            ->where('liked_user_id', $likedUserId)
            ->first();

        if ($existingLike) {
            return response()->json(['message' => 'You have already liked this user'], 400);
        }

        // Create a new like
        Like::create([
            'user_id' => $currentUser->id,
            'liked_user_id' => $likedUserId
        ]);

        // Check if the liked user has also liked the current user
        $mutualLike = Like::where('user_id', $likedUserId)
            ->where('liked_user_id', $currentUser->id)
            ->first();

        if ($mutualLike) {
            // Add both users to each other's friend list
            $currentUser->friends()->attach($likedUserId);
            $mutualLike->user->friends()->attach($currentUser->id);

            return response()->json(['message' => 'You are now friends!'], 200);
        }

        return response()->json(['message' => 'User liked successfully'], 200);
    }
    // cancel heart request post api
    public function CancelLike(Request $request)
    {
        $currentUser = auth()->user()->id;
        $likedUserId = $request->user_id;

        $data = Like::where('liked_user_id', $currentUser)->where('user_id', $likedUserId)->first();
        // dd($data);
        if (!$data) {
            return response()->json(['message' => 'User Not Found']);
        }

        $data->delete();

        return response()->json(['message' => 'Request Cancelled']);
    }

    // current login user vsit to any user post api
    public function VisitToUsers($userId)
    {
        // Ensure the user exists
        $visitedUser = User::findOrFail($userId);

        // Get the current logged-in user's ID
        $visitorId = auth()->id();

        // Prevent users from visiting their own profile
        if ($visitorId == $userId) {
            return response()->json(['message' => 'You cannot visit your own profile.'], 400);
        }

        // Check if the visit already exists
        $visit = ProfileVisit::where('visitor_user_id', $visitorId)
            ->where('visited_user_id', $userId)
            ->first();

        if ($visit) {
            // Update the existing visit's timestamp
            $visit->touch();  // This updates the 'updated_at' timestamp
            return response()->json(['message' => 'You are again visited This Profile Are you intrested this user?'], 200);
        }

        // If no existing visit, create a new one
        $visit = new ProfileVisit([
            'visitor_user_id' => $visitorId,
            'visited_user_id' => $userId
        ]);
        $visit->save();

        // Return a success response
        return response()->json(['message' => 'Profile visit recorded successfully.'], 200);
    }

    // current login user check own profile who is matched visitor likes etc....
    public function Favorites(Request $request)
    {
        $currentUser = auth()->user();

        // Get count of friends of the current user
        $friendsCount = $currentUser->friends()->count();

        // Get count of users who liked the current user
        $likesCount = User::whereHas('likes', function ($query) use ($currentUser) {
            $query->where('liked_user_id', $currentUser->id);
        })->count();

        // Profile match condition based on user's information
        $matchesCount = User::whereHas('information', function ($query) use ($currentUser) {
            $query->where('country', $currentUser->information->country)
                ->orWhere('location', $currentUser->information->location)
                ->orWhere('interest', $currentUser->information->interest);
        })->count();

        // Get count of users who visited the current user's profile
        $visitorCount = $currentUser->visits()->count();

        return response()->json([
            'friends' => $friendsCount,
            'likes' => $likesCount,
            'matches' => $matchesCount,
            'visitors' => $visitorCount
        ], 200);
    }
    // check friend list Get APi
    public function FriendsList(Request $request)
    {
        $currentUser = auth()->user();

        if (!$currentUser) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Assuming you have a `friends` relationship defined on the User model
        $friends = $currentUser->friends()->with(['information:id,user_id,gender', 'profile:id,user_id,image,video'])->select('users.id', 'users.user_name', 'users.country')
            ->get();

        if ($friends->isEmpty()) {
            return response()->json(['message' => 'Blank Friends List'], 404);
        } else {
            return response()->json($friends, 200);
        }
    }

    // check who is vist is own my profile
    public function VisitorList(Request $request)
    {
        $currentUser = auth()->user();

        $visitors = $currentUser->visits()
            ->with([
                'visitor' => function ($query) {
                    $query->select('id', 'user_name', 'country')
                        ->with([
                            'information' => function ($infoQuery) {
                                $infoQuery->select('user_id', 'gender'); // Assuming the foreign key is user_id
                            },
                            'profile' => function ($profileQuery) {
                                $profileQuery->select('user_id', 'image', 'video'); // Assuming the foreign key is user_id
                            }
                        ]);
                }
            ])
            ->get(['visitor_user_id']); // Only get the visitor_user_id as that's the link in the visits table

        if ($visitors->isEmpty()) {
            return response()->json(['message' => 'Blank Visitor List'], 404);
        }
        return response()->json($visitors, 200);
    }

    // check who like me
    public function LikeList(Request $request)
    {
        $currentUser = auth()->user();

        // Get users who have liked the current user
        $usersWhoLikedCurrentUser = $currentUser->likes()
            ->with(['likedUser.information:id,user_id,gender', 'likedUser.profile'])
            ->get(['id', 'liked_user_id']); // Select only the id and liked_user_id for filtering

        // Transform the collection to include only the desired fields
        $transformedUsers = $usersWhoLikedCurrentUser->map(function ($like) {
            $likedUser = $like->likedUser;
            $information = $likedUser->information;
            return [
                'id' => $like->id,
                'liked_user_id' => $like->liked_user_id,
                'user_name' => $likedUser->user_name,
                'country' => $likedUser->country,
                'gender' => $information ? $information->gender : null, // Check if information exists
                'profile' => $likedUser->profile,
            ];
        });

        if ($transformedUsers->isEmpty()) {
            return response()->json(['message' => 'No users have liked you'], 404);
        } else {
            return response()->json($transformedUsers, 200);
        }
    }

    // check who user matched Own My Profile

    public function MatchedUser(Request $request)
    {
        $currentUser = auth()->user();

        if (!$currentUser) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }

        // Fetch the IDs of the current user's friends with explicit table reference
        $friendsIds = $currentUser->friends()->select('users.id')->pluck('id');

        // Fetch users who are not friends with the current user and exclude the current user
        // Also match location, country, and gender
        $suggestedUsers = User::with([
            'profile:id,user_id,image,video',
            'information:id,user_id,gender,location'
        ])->select('id', 'user_name', 'country')
            ->whereNotIn('id', $friendsIds)
            ->where('id', '!=', $currentUser->id)
            ->whereHas('information', function ($query) use ($currentUser) {
                $query->where('gender', $currentUser->information->gender);
                // Add more conditions here as needed
            })->get();

        if ($suggestedUsers->isEmpty()) {
            return response()->json(['message' => 'No Users Found'], 404);
        }

        return response()->json($suggestedUsers);
    }


    public function blockUser(Request $request, $userId)
    {
        $currentUser = auth()->user();
        $userToBlock = User::findOrFail($userId);

        if ($currentUser->id == $userId) {
            return response()->json(['message' => 'You cannot block yourself.'], 400);
        }
        $isFriend = $currentUser->friends()->where('friend_id', $userId)->exists();
        if (!$isFriend) {
            return response()->json(['message' => 'You are not friend with this user.'], 400);
        }

        if ($currentUser->blockedUsers()->where('blacklisted_user_id', $userId)->exists()) {
            return response()->json(['message' => 'User already blocked.'], 400);
        }

        $currentUser->blockedUsers()->attach($userId);

        return response()->json(['message' => 'User blocked successfully.'], 200);
    }

    public function unblockUser(Request $request, $userId)
    {
        $currentUser = auth()->user();
        $userToUnblock = User::findOrFail($userId);
        if ($currentUser->id == $userId) {
            return response()->json(['message' => 'You cannot unblock yourself.'], 400);
        }
        $currentUser->blockedUsers()->detach($userId);
        return response()->json(['message' => 'User unblocked successfully.'], 200);
    }

    public function getBlockedUsers(Request $request)
    {
        $currentUser = auth()->user();
        $blockedUsers = $currentUser->blockedUsers()->get();
        if ($blockedUsers->isEmpty()) {
            return response()->json(['message' => 'No Blocked Users were found.'], 400);
        } else {
            return response()->json($blockedUsers, 200);
        }
    }

    public function User(Request $request, $userId)
    {
        $currentUser = auth()->user();
        // dd($userId);
        $user = User::with('information', 'profile')->find($userId);

        if (!$user) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
        if ($currentUser->id == $userId) {
            return response()->json(['message' => 'You Cant View YourSelf'], 400);
        }
        return response()->json(['message' => 'User', $user], 200);
    }

    public function getUserProfile()
    {
        $userId = Auth::user()->id;

        $getUserProfile = User::where('id', $userId)
        ->select('id', 'first_name')
        ->with(['profile' => function($query) {
            $query->select('id', 'user_id', 'image')
                ->selectRaw("SUBSTRING_INDEX(image, ',', 1) AS image");
        },'goalsareas:id,user_id,areas'])
        ->withCount('likes')
        ->get();
        return response()->json(['status' => true, 'getUserProfile' => $getUserProfile], 200);
    }
}
