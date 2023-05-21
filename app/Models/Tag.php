<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;

class Tag extends Model implements ContractsTranslatable
{
    use Translatable;
    use HasFactory;
    protected $table="tags";
    protected $guarded=['id'];
    public $timestamps = true;
    public $translatedAttributes = ['name'];

}
