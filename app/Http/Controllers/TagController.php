<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    public function index()
    {
        $tag = Tag::with('ads')->get();
        // now we have all tags join with its ads
        return response()->json($tag);
    }
    public function insert(Request $request)
    {
        $tag = new Tag();


        //$ads = Ad::all();
        //in this commented below we have all Ads so we can insert the ad_id of the tag by the user choose in frontend


        //I will insert the tag with first Ad as default
        $ad = Ad::first();

        $validator  = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'ad_id' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $tag->title = $request->input('title');
        $tag->ad_id = $ad->id;
        $tag->save();
        return response()->json(["tag created successfully", $tag]);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        //$ads = Ad::all();
        //in this commented below we have all Ads so we can edit the ad_id of the tag by the user choose in frontend

        //I will update the tag with first Ad as default
        $ad = Ad::first();


        $validator  = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'ad_id' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $tag->title = $request->input('title');
        $tag->ad_id = $ad->id;
        $tag->update();
        return response()->json(["tag updated successfully", $tag]);
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return response()->json("tag deleted successfully");
    }
}
