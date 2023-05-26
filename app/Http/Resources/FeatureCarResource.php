<?php

namespace App\Http\Resources;

use App\Models\FeatureList;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureCarResource extends JsonResource
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
        'id'=>$this->id,
        'title'=>$this->name,
        'feature_list_name'=>FeatureList::find($this->pivot->feature_list_id)->name
      ];
    }
}
