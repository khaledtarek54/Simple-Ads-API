<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\TagResource;
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
        
        $ads = Ad::with('categories')
        ->whereHas('categories',function($query)use($id){
            $query->where('id',$id);
        })
        ->get();
        return TagResource::collection($ads);
        
        //return response()->json(["Ads with The same category id = ".$id, $fiteredad]);
    }
    public function bytag($id)
    {

        $ad = Ad::with('tags')
        ->whereHas('tags',function($query)use($id)
        {
          $query->where('id',$id);  
        })
        ->get();
        return TagResource::collection($ad);
        
        
    }
    public function advertiserads($id)
    {
    
       return AdResource::collection(Ad::with('advertisers')
       ->where('advertiser_id',$id)
       ->get());
        
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
