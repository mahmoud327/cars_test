<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTranslation extends Model
{
    use HasFactory;
    protected $table="tag_translations";
    protected $guarded=['id'];
    public $timestamps = true;
    protected $fillable = ['name'];




}
