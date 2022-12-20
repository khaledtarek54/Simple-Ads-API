<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Ad;
use App\Models\Tag;
use App\Models\Category;
use App\Mail\AdRemainder;
use App\Models\Advertiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdController extends Controller
{
    public function bycategory($id)
    {
        $categories = Category::with('ads')->where('id', $id)->get();
        $ads = collect();
        foreach ($categories as $category) {
            $ads->push($category->ads);
        }
        return response()->json(["Ads with The same category id", $ads]);
    }
    public function bytag($id)
    {
        $tags = Tag::with('ads')->where('id', $id)->get();
        $ad = collect();
        foreach ($tags as $tag) {
            $ad->push($tag->ads);
        }
        return response()->json(["Ad filtered by tag id", $ad]);
    }
    public function advertiserads($id)
    {
        $advertisers = Advertiser::with('ads')
            ->where('id', $id)
            ->get();
        $ads = collect();
        foreach ($advertisers[0]->ads as $ad) {
            $ads->push($ad);
        }
        return response()->json(["Advertiser Owned Ads",$ads]);
    }

    public function mail()
    {
        $dayAfter = (new DateTime('now'))->modify('+1 day')->format('Y-m-d');
        $advertisers  = Advertiser::with('ads')->get();
        foreach ($advertisers as $advertiser) {
            foreach ($advertiser->ads as $ad) {
                if ($ad->start_date == $dayAfter) {
                    Mail::to($advertiser->email)->send(new AdRemainder($ad));
                }
            }
        }


        return response()->json("check your mail");
    }
}
