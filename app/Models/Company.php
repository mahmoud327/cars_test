<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{


    protected $table = 'companies';
    protected $appends = [
        'image_path',
    ];

    public $timestamps = true;



    protected $fillable = [
       'name',
       'city',
       'country',
       'user_id',
       'image',
       'phone',
       'address',
       'email'
    ];


    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    /*
     * ----------------------------------------------------------------- *
     * ----------------------------- Acessores ---------------------------- *
     * ----------------------------------------------------------------- *
     */




     public function getImagePathAttribute()
     {
         return $this->image ? asset('uploads/companies/' .$this->image) : asset('uploads/default.jpeg');

     }


    /*
     * ----------------------------------------------------------------- *
     * ----------------------------- relations ---------------------------- *
     * ----------------------------------------------------------------- *
     */


    public function category()
    {
         return  $this->belongsTo('App\Models\Category','category_id');
    }


    public function medias()
    {
        return $this->morphMany('App\Models\Media', 'mediaable');
    }
    public function scopeActive($q){
     $q->where('active',1);
    }
}

