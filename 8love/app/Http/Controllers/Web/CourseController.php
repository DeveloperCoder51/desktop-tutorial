<?php

namespace App\Http\Controllers\Web;

use App\Models\Course;
use App\Models\Category;
use App\Models\CourseAudio;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('category', 'author')->orderBy('created_at','DESC')->get();
        return view('web.Course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('web.Course.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $course = new Course();
            $course->name = $request->name;
            $course->description = $request->description;
            $course->category_id = $request->category_id;
            $course->status = $request->status;
            $course->type = $request->type;
            $course->states = $request->states;
            $course->charges = $request->charges;
            $course->price = $request->price;
            $course->student_what_gain = $request->student_what_gain;
            $course->created_by = auth()->id();

            $course->save();

            if ($request->hasFile('video') || $request->hasFile('audio')) {
                foreach ($request->file('video') as $videoFile) {
                    $videoFilename = time() . '_' . uniqid() . '.' . $videoFile->getClientOriginalExtension();
                    $videoFile->move(public_path('Course-Videos'), $videoFilename);

                    $courseVideo = new CourseVideo();
                    $courseVideo->course_id = $course->id;
                    $courseVideo->video = $videoFilename;

                    if ($request->hasFile('audio')) {
                        $audioFile = $request->file('audio')[array_search($videoFile, $request->file('video'))];
                        $audioFilename = time() . '_' . uniqid() . '.' . $audioFile->getClientOriginalExtension();
                        $audioFile->move(public_path('Course-Audios'), $audioFilename);
                        $courseVideo->audio = $audioFilename;
                    }

                    $courseVideo->save();
                }
            }

            DB::commit();

            return redirect()->route('course.index')->with('success', 'Course created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while saving the course. Please try again.']);
        }
    }


    public function edit(string $id)
    {
        $categories = Category::all();
        $course = Course::findOrFail($id);
        return view('web.Course.edit', compact('course', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'category_id' => 'required|exists:categories,id',
        //     'status' => 'required|in:active,inactive',
        //     'type' => 'required|in:online,offline',
        //     'video.*' => 'nullable|mimes:mp4,mov,avi|max:50000',
        //     'audio.*' => 'nullable|mimes:mp3,wav|max:50000',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        try {
            DB::beginTransaction();

            $course = Course::findOrFail($id);
            $course->name = $request->name;
            $course->description = $request->description;
            $course->category_id = $request->category_id;
            $course->status = $request->status;
            $course->type = $request->type;
            $course->states = $request->states;
            $course->charges = $request->charges;
            $course->price = $request->price;
            $course->student_what_gain = $request->student_what_gain;
            $course->created_by = auth()->id();

            $course->save();

            if ($request->hasFile('video') || $request->hasFile('audio')) {
                CourseVideo::where('course_id', $course->id)->delete(); // Clear existing course videos

                foreach ($request->file('video') as $videoFile) {
                    $videoFilename = time() . '_' . uniqid() . '.' . $videoFile->getClientOriginalExtension();
                    $videoFile->move(public_path('Course-Videos'), $videoFilename);

                    $courseVideo = new CourseVideo();
                    $courseVideo->course_id = $course->id;
                    $courseVideo->video = $videoFilename;

                    if ($request->hasFile('audio')) {
                        $audioFile = $request->file('audio')[array_search($videoFile, $request->file('video'))];
                        $audioFilename = time() . '_' . uniqid() . '.' . $audioFile->getClientOriginalExtension();
                        $audioFile->move(public_path('Course-Audios'), $audioFilename);
                        $courseVideo->audio = $audioFilename;
                    }

                    $courseVideo->save();
                }
            }

            DB::commit();

            return redirect()->route('course.index')->with('success', 'Course updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => 'An error occurred while updating the course. Please try again.']);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('course.index')->with('success', 'Course Delete successfully');
    }

    public function block($id)
    {
        $user = Course::findOrFail($id);
        $user->status = 'block';
        $user->save();
        return redirect()->back()->with('success', 'Course has been successfully Block');
    }
    public function unblock($id)
    {
        $user = Course::findOrFail($id);
        $user->status = 'active';
        $user->save();
        return redirect()->back()->with('success', 'Course has been successfully Active');
    }
}
