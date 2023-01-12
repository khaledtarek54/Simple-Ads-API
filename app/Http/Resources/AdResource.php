<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title'=>$this->title,
            'type'=>$this->type,
            'description'=>$this->description,
            'start_date'=>$this->start_date,
            'advertiser_details'=>new AdvertiserResource($this->advertisers)
        ];
    }
}
