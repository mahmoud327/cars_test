<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'make'=>optional($this->make)->name,
            'model'=>optional($this->model)->name,
            'year'=>$this->year,
            'price'=>$this->price,
            'mileage'=>$this->mileage,
            'engine_size'=>$this->engine_size,
            'vin_number'=>$this->vin_number,
            'tags'=>TagResource::collection($this->tags??[]),
            'attachments'=>AttachmentResource::collection($this->attachments??[]),
            'features' =>  FeatureCarResource::collection($this->features??[]),
            'show_url' => route('cars.show', ['car' => $this->id]),





        ];
    }
}
