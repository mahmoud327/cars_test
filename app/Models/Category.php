<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements ContractsTranslatable
{
    use Translatable;


    protected $table = 'categories';
   protected $guarded = ['id'];

    public $timestamps = true;
    public $translatedAttributes = ['name'];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }




}

