<?php

namespace App\Http\Resources;

use App\Models\Translation\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class AllCompanyResource extends JsonResource
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
            'cars' => CarResource::collection($this->cars ?? []),
            'featureImage' => $this->feature_image_path,

        ];
    }
}

https://ezcariq.com/api/v1/user/cars

Post method
-cars-for-user

https://ezcariq.com/api/v1/companies
get method


https://ezcariq.com/api/v1/cars
all-cars-for-guest
get method


https://ezcariq.com/api/v1/companies
get method

all companies 

https://ezcariq.com/api/v1/company-details/8
هترجع تفاصيل الشركة ومعاها  array-of-cars
get method
