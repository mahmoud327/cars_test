<?php

namespace App\Http\Resources;

use App\Models\Translation\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailCompanyResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city_id' => $this->city_id,
            'city_name' => optional($this->city)->title,
            'image' => $this->image_path,
            'featureImage' => $this->feature_image_path,

        ];
    }
}

