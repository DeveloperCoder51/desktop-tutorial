<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlockListController extends Controller
{
    public function block($id){
        $user = User::findOrFail($id);
        $user->status_to_use_app = 'block';
        $user->save();
        return redirect()->back()->with('success','User has been successfully Block');
    }
    public function unblock($id){
        $user = User::findOrFail($id);
        $user->status_to_use_app = 'active';
        $user->save();
        return redirect()->back()->with('success','User has been successfully Active');
    }
    public function blocklist (){
        $users = User::with('information','profile')->where('status_to_use_app','block')->where('role','user')->orderBy('created_at', 'asc' )->get();
        return view('Web.Block.list', compact('users'));
    }
}
