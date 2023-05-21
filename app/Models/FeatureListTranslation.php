<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureListTranslation extends Model
{
    use HasFactory;
    protected $table = 'feature_list_translations';
    public $timestamps = false;
    protected $fillable = ['name'];
}
