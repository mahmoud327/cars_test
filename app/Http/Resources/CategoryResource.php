<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'image'=>asset('uploads/categories/' . $this->image) ,
            'title' => $this->name,
            'children'=>CategoryResource::collection($this->children),



        ];

    }

}
