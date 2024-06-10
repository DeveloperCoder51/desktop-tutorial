<?php

namespace App\Http\Controllers\Api;

use App\Models\GoalAreas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class GoalsAreasController extends Controller
{
    public function GoalsAreas(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(),[
            'goals' => 'required',
            'areas' => 'required|array',
        ]);

        if($validator->fails())
        {
            return response()->json(['success' => false, $validator->errors()],400);
        }

        $user = auth()->user()->id;

        if(!$user)
        {
            return response()->json(['success' => false, 'message' => 'User not found'],400);
        }

        $goalsareas = new GoalAreas();
        $goalsareas->goals = $request->goals;
        $goalsareas->areas = implode(',', $request->areas);
        $goalsareas->user_id = $user;
        $goalsareas->save();

        return response()->json(['success' => true, 'message' => 'Course added successfully'],200);
    }
}
