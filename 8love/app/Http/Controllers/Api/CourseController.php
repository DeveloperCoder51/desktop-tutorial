<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\UserSelectedCourse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function GetCourses()
    {
        $categories = Category::with(['courses', 'coursescount'])->select('id', 'name', 'image')->get();
        return response()->json(['status' => true, 'categories' => $categories], 200);
    }

    public function storeCourseByUser(Request $request)
    {
        $userId = Auth::id();

        $alreadySelected = UserSelectedCourse::where('user_id', $userId)
            ->where('course_id', $request->course_id)
            ->where('category_id', $request->category_id)
            ->exists();

        if ($alreadySelected) {
            return response()->json(['status' => false, 'message' => 'You have already selected this course and category.'], 400);
        }

        $userSelectedCourse = new UserSelectedCourse();
        $userSelectedCourse->user_id = $userId;
        $userSelectedCourse->course_id = $request->course_id;
        $userSelectedCourse->category_id = $request->category_id;
        $userSelectedCourse->spendtime = $request->spendtime;
        $userSelectedCourse->save();
        return response()->json(['status' => true, 'message' => 'User course category stored successfully.'], 200);
    }

    // public function getAuthors()
    // {
    //     try {
    //         $authors = User::with('profile:id,user_id,image,video') // ensure 'user_id' is part of the profile relationship keys if needed
    //             ->where('role', 'author')
    //             ->select('id', 'user_name') // Assuming 'user_name' is correct; might need to be 'username'
    //             ->orderBy('id', 'DESC')
    //             ->take(5)
    //             ->get();

    //         return response()->json(['success' => true, 'authors' => $authors], 200);
    //     } catch (\Exception $e) {
    //         // It's a good practice to log the actual error message in your server logs, not expose it directly
    //         return response()->json(['success' => false, 'message' => 'Failed to retrieve authors'], 500);
    //     }
    // }

    // public function recommendedCourse(Request $request)
    // {
    //     try {
    //         // Placeholder for recommendation logic, for now, simply fetching all
    //         // Later, you might add filters or sorting based on passed parameters
    //         // $limit = $request->query('limit', 10);  // Default to 10, adjust as necessary
    //         $recommendedCourses = Course::with('author')->get();
    //         return response()->json(['courses' => $recommendedCourses], 200);
    //     } catch (\Exception $e) {
    //         // Log error or handle it accordingly
    //         return response()->json(['message' => 'Failed to retrieve recommended courses'], 500);
    //     }
    // }

    public function getAuthorsAndRecommendedCourses(Request $request, $categoryId)
    {
        // Find the category by ID
        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        // Get the authors who have created courses in the specified category
        $authors = User::whereHas('courses', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })->with(['courses' => function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        }])->get();

        // Prepare the response data
        $response = [
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
            ],
            'top_authors' => $authors->map(function ($author) {
                return [
                    'id' => $author->id,
                    'user_name' => $author->user_name,
                    'profile' => $author->profile // Assuming profile contains additional information
                ];
            }),
            'courses' => $category->courses->map(function ($course) {
                // Assuming videos are related to the course through a 'videos' relationship
                $videos = $course->VideosAudios->pluck('video')->toArray();

                $audios = $course->VideosAudios->pluck('audio')->toArray();

                return [
                    'id' => $course->id,
                    'name' => $course->name,
                    'type' => $course->type,
                    'videos' => $videos,
                    'audios' => $audios

                ];
            })
        ];

        return response()->json(['status' => true, 'response' => $response], 200);
    }


    public function PopularSkills()
    {
        $categories = Category::with(['courses:id,created_by,name', 'coursescount'])->select('id', 'name', 'image')->get();
        return response()->json(['status' => true, 'categories' => $categories], 200);
    }


    public function Categories()
    {
        $categories = Category::with(['courses:id,created_by,name', 'coursescount'])->select('id', 'name', 'image')->get();
        return response()->json(['status' => true, 'categories' => $categories], 200);
    }

    public function NewRelease()
    {
        $categories = Category::with([
            'courses' => function ($query) {
                $query->select('id', 'name',  'category_id');
            },
            'coursescount'
        ])->select('id', 'name')->orderBy('id', 'desc')->get();

        return response()->json(['status' => true, 'categories' => $categories], 200);
    }

    public function searchCourses($query)
    {
        $courses = Course::where('name', 'LIKE', "%{$query}%")
            ->select('id', 'name', 'category_id', 'created_by')
            ->with(['category:id,name', 'author:id,user_name'])
            ->get();

        if ($courses->isEmpty()) {
            return response()->json(['message' => 'No courses found'], 404);
        }

        // Return the found courses
        return response()->json(['status' => true, 'courses' => $courses], 200);
    }


    public function getAuthorsList()
    {
        $authors = User::where('role', 'author')
            ->withCount('likes') // This will add a 'likes_count' attribute to the users
            ->with('information:id,user_id,type') // Load specific columns from user_information
            ->select('id', 'user_name') // Select specific columns from users table
            ->get();
        return response()->json(['status' => true, 'authors' => $authors], 200);
    }


    public function getCourseDetails($courseId)
    {
        $course = Course::with([
            'category:id,name',
            'author' => function ($query) {
                $query->select('id', 'first_name')->withCount('likes');
            },
            'VideosAudios' => function ($query) {
                $query->select('id', 'course_id', 'video', 'audio'); // Select only necessary columns
            }
        ])->find($courseId);

        if (!$course) {
            return response()->json(['status' => false, 'message' => 'Course not found'], 400);
        }

        return response()->json(['status' => true, 'course' => $course], 200);
    }


    public function getMyCoursesCategory()
    {
        // $geCourseCategory = Category::select('id', 'name', 'image')->withCount('courses')->get();
        // return response()->json(['status' => true, 'category' => $geCourseCategory], 200);

        $user_id = Auth::user()->id;

        $getCategory = User::where('id', $user_id)
            ->select('id', 'first_name')
            ->withCount('courses')
            ->with('categories:id,created_by,name,image')
            ->get();
        return response()->json(['status' => true, 'category' => $getCategory], 200);
    }

    public function LatestCourse()
    {
        $getCourses = Course::select('id', 'name', 'category_id')
            ->with('category:id,name')
            ->with('VideosAudios:id,course_id,video,audio')
            ->orderBy('id', 'DESC')
            ->take(5)
            ->get();

        return response()->json(['status' => true, 'courses' => $getCourses], 200);
    }


    public function FilterCourse(Request $request)
    {
        // Retrieve filter criteria from request body
        $filterCriteria = $request->json()->all();

        $query = Course::query();

        if (isset($filterCriteria['newCourse']) && $filterCriteria['newCourse'] === 'new') {
            // If it's a new course request
            $query->orderBy('created_at', 'DESC');
        } elseif (isset($filterCriteria['oldCourse']) && $filterCriteria['oldCourse'] === 'old') {
            // If it's an old course request
            $query->orderBy('created_at', 'ASC');
        } elseif (isset($filterCriteria['course'])) {
            // If it's a popular course request or specific course request
            $courseName = $filterCriteria['course'];
            $query->where('name', 'LIKE', "%{$courseName}%")->where('states', 'popular');
        }

        // Apply charges filter if present
        if (isset($filterCriteria['charges'])) {
            $charges = $filterCriteria['charges'];
            $query->where('charges', $charges);
        }

        // Apply price range filter if present
        if (isset($filterCriteria['min_price']) && isset($filterCriteria['max_price'])) {
            $minPrice = $filterCriteria['min_price'];
            $maxPrice = $filterCriteria['max_price'];
            $query->whereBetween('price', [$minPrice, $maxPrice]);
        }

        // Fetch courses
        $courses = $query->take(5)
            ->select('id', 'name', 'charges', 'price', 'category_id', 'created_by')
            ->with(['category:id,name', 'author:id,user_name'])
            ->get();

        return response()->json(['status' => true, 'courses' => $courses], 200);
    }

    // public function getMyCoursesCategory()
    // {
    //     // $geCourseCategory = Category::select('id', 'name', 'image')->withCount('courses')->get();
    //     // return response()->json(['status' => true, 'category' => $geCourseCategory], 200);

    //     $user_id = Auth::user()->id;

    //     $getCategory = User::where('id', $user_id)
    //     ->select('id', 'first_name')
    //     ->withCount('courses')
    //     ->with('categories:id,created_by,name,image')
    //     ->get();
    //     return response()->json(['status' => true, 'category' => $getCategory], 200);
    // }

    public function OurCourse()
    {
        // $getCourses = Course::select('id', 'name', 'category_id')
        //     ->with('category:id,name')
        //     ->with('VideosAudios:id,course_id,video,audio')
        //     ->orderBy('id', 'DESC')
        //     ->take(5)
        //     ->get();

        // return response()->json(['status' => true, 'courses' => $getCourses], 200);

        $user_id = Auth::user()->id;

        $getCourses = User::where('id', $user_id)
            ->select('id', 'first_name')
            ->with(['courses' => function ($query) {
                $query->select('id', 'created_by', 'name')
                    ->with('VideosAudios:id,course_id,video');
            }])
            ->get();
        return response()->json(['status' => true, 'latestcourses' => $getCourses], 200);
    }


    public function getSelectedAuthor($author_id)
    {

        $getAuthors = User::where('id', $author_id)
        ->where('role', 'author')
        ->select('id', 'first_name', 'role')
        ->withCount('likes')
        ->with(['courses' => function($query){
            $query->select('id','created_by','name')->with('VideosAudios:id,course_id,video,audio');
        },
         'information:id,user_id,type', 'profile' => function($query){
            $query->select('id', 'user_id', 'image')
            ->selectRaw("SUBSTRING_INDEX(image, ',', 1) AS image");
        }])->get();

        if($getAuthors->isNotEmpty())
        {
            return response()->json(['status' => true, 'authors' => $getAuthors], 200);
        }
        else
        {
            return response()->json(['status' => false,'message' => 'Author not found'], 400);
        }
    }

    public function getSelectedCourses($course_id)
    {
        $getCourse = Course::where('id', $course_id)->select('id', 'name','type','description','student_what_gain','created_by','category_id')
            ->with(['author'=>function($query){
                $query->select('id','user_name')->withCount('likes');
            },'VideosAudios:id,course_id,video,audio', 'category:id,name,image'])
            ->first();

        if (!$getCourse) {
            return response()->json(['status' => false, 'message' => 'Course not found'], 404);
        }

        return response()->json(['status' => true, 'Selected Course' => $getCourse], 200);
    }

}
