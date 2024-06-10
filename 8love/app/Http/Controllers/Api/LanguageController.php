<?php
namespace App\Http\Controllers\Api;


use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function showlanguage()
    {
        // Retrieve available languages
        $languages = ['English', 'Spanish', 'French'];
        return response()->json($languages);
    }

    public function storeLanguages(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'language' => 'required',
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

        $language = new Language();
        $language->languages = $request->language;
        $language->user_id = $user;

        $existLangauge = $language::where('user_id', $user)->where('languages', $request->language)->first();
        if($existLangauge)
        {
            return response()->json(['success' => false, 'message' => 'Language already selected by this User'],400);
        }

        $language->save();

        return response()->json(['success' => true, 'message' => 'Language added successfully'],200);
    }
}
