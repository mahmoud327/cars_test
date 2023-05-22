<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Tags\Url;

class Page extends Model implements TranslatableContract
{

    use Translatable;
    use HasFactory;
    protected $table = 'pages';
    public $timestamps = true;
    protected $fillable = ['slug'];
    public $translatedAttributes = ['title', 'content'];

}
