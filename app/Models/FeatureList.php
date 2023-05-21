<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;

class FeatureList  extends Model implements ContractsTranslatable
{
    use Translatable;

    use HasFactory;
    protected $table = 'feature_lists';
    protected $guraded = ['id'];
    public $timestamps = true;
    public $translatedAttributes = ['name'];
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
