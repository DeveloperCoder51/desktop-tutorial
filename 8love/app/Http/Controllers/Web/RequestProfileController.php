<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RequestProfileController extends Controller
{
    public function requestProfile() {
        $data = User::with('profile')->where('request_process', 'pending')->get();
        $pendingCount = $data->count();
        $dataaccept = User::with('profile')->where('request_process', 'accept')->get();
        $acceptCount = $dataaccept->count();
        $blockdata = User::with('profile')->where('status_to_use_app', 'block')->get();
        $blockcount = $blockdata->count();
        return view('web.RequestProfile.index', compact('data', 'pendingCount','acceptCount','blockcount'));
    }


    public function processRequests(Request $request)
    {
        $request->validate([
            'users' => 'required|array|min:1',
            'users.*' => 'exists:users,id',
        ]);

        // Get the selected user IDs from the request
        $selectedUserIds = $request->input('users', []);

        // Update the request_process field for the selected users
        User::whereIn('id', $selectedUserIds)->update(['request_process' => 'accept']);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Selected users have been approved.');
    }
}