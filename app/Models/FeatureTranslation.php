<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureTranslation extends Model
{
    use HasFactory;
    protected $table="feature_translations";
    public $timestamps = false;
    protected $fillable = ['name'];

}
