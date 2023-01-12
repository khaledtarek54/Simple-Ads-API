<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'title',
        'type',
        'description',
        'category_id',
        'advertiser_id',
        'tag_id',
        'start_date'
    ];


    public function advertisers()
    {
        return $this->belongsTo(Advertiser::class,'advertiser_id','id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    
}
