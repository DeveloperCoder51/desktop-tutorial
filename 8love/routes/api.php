<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LanguageController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\GoalsAreasController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\FavoriteDestinationController;
use App\Http\Controllers\Api\HotelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(UserController::class)->group(function(){
    Route::post('/register','register');
    Route::post('/login','login');
});

Route::middleware(['auth:sanctum'])->group(function(){
    // Dating Application
    Route::controller(UserController::class)->group(function(){
        Route::post('/verify-email', 'verifyEmail');
        Route::post('/verify-otp', 'verifyOtpAndEmail');
        Route::post('/change-password', 'changePassword');
        Route::get('/get-all-user',  'AllUsers');
        Route::get('/get-paid-user',  'PaidUsers');
        Route::get('/get-new-user',  'NewUsers');
        Route::get('/get-nearby-user',  'GetNearby');
        Route::post('/add-friend/{user}', 'addFriend');
        Route::get('/discover-users','discoverUsers');
        Route::get('/filter-users','filterUsers');
        Route::post('/like-User', 'likeUser');
        Route::post('/cancel-like','CancelLike');
        Route::get('/favorites', 'Favorites');
        Route::post('/visit-user/{userId}',  'VisitToUsers');
        Route::get('/friends-List',  'FriendsList');
        Route::get('/visitor-list',  'VisitorList');
        Route::get('/like-list',  'LikeList');
        Route::get('/matched-user',  'MatchedUser');
        Route::post('/block/{userId}',  'blockUser');
        Route::delete('/unblock/{userId}',  'unblockUser');
        Route::get('/blocked-user', 'getBlockedUsers');
        Route::get('/user/{userId}', 'User');
        Route::get('/get-user-profile', [UserController::class, 'getUserProfile']);
    });
    // Learning Applications
    Route::post('/logout',[UserController::class,'logout'] );
    Route::post('/profiles', [ProfileController::class, 'store'])->name('profiles.store');

    Route::controller(LanguageController::class)->group(function(){
        Route::get('/language-show', 'showlanguage');
        Route::post('/language-create', 'storeLanguages');
    });

    Route::controller(GoalsAreasController::class)->group(function(){
        Route::post('/goals-areas', 'GoalsAreas');
    });


    Route::controller(CourseController::class)->group(function(){
        Route::get('/get-courses', 'GetCourses');
        Route::post('/store-course-user', 'storeCourseByUser');
        // Route::get('/get-authors', 'getAuthors');
        // Route::get('/recommender-courses', 'RecommendedCourse');

        Route::get('/authors-and-courses/{category_id}',  'getAuthorsAndRecommendedCourses');

        Route::get('/popular-skill', 'PopularSkills');
        Route::get('/categories', 'Categories');
        Route::get('/new-release', 'NewRelease');
        Route::get('/search-courses/{query}', 'searchCourses');
        Route::get('/get-authors-list', 'getAuthorsList');
        Route::get('/get-course-details/{course}', 'getCourseDetails');
        // Route::get('/get-my-course-category', 'getMyCoursesCategory');
        Route::get('/latest-course', 'LatestCourse');
        Route::get('/filter-course','FilterCourse');

        Route::get('/get-my-course-category', 'getMyCoursesCategory');
        Route::get('/our-course', 'OurCourse');
        Route::get('/get-selected-author/{author_id}', 'getSelectedAuthor');
        Route::get('/get-selected-courses/{course_id}', 'getSelectedCourses');
    });


    // Travelers  Application
    Route::controller(DestinationController::class)->group(function(){
      Route::get('/destination-popular', 'DestinationPopular');
      Route::get('/destination-most-popular', 'DestinationMostPopular');
      Route::get('favorites-destination-nearby-hotels' , 'favoriteDestinationNearByHotels');
    });

    Route::controller(HotelController::class)->group(function(){
        Route::get('/hotel-filter', 'HotelFilter');
        Route::get('/destination-filter', 'destinationFilter');

      });

      Route::controller(FavoriteDestinationController::class)->group(function(){
        Route::post('/favorites-destination-add', 'addToFavorites');
        Route::delete('/favorites-destination-remove', 'removeFromFavorites');
        Route::get('get-favorites-destination' , 'getFavoritesDestination');

      });
});
