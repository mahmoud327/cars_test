<?php

namespace App\Models;

use App\Traits\GetAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use GetAttribute;

    use HasFactory;
    protected $guarded = ['id'];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->multiple_attachment = true;
        $this->multiple_attachment_usage = ['default', 'bdf-file'];

    }
    
    public function make()
    {
        return $this->belongsTo(Category::class, 'make_id');
    }
    public function model()
    {
        return $this->belongsTo(Category::class, 'model_id');
    }
    public function features()
    {
        return $this->belongsToMany(Feature::class, 'car_feature', 'car_id', 'feature_id')->withPivot('feature_list_id');
    }
    public function featureList()
    {
        return $this->belongsToMany(FeatureList::class, 'car_feature', 'car_id', 'feature_list_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'car_tag', 'car_id', 'tag_id');
    }
}
