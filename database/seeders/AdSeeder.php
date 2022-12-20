<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['free','paid'];
        DB::table('ads')->insert([
            'title' => Str::random(10),
            'type' => $array[rand(0,1)],
            'description' => Str::random(50),
            'start_date'=> date('Y-m-d',time()),
            'advertiser_id'=> rand(1,Advertiser::count()),
            'category_id'=> rand(1,Category::count()),
            
        ]);
    }
}
