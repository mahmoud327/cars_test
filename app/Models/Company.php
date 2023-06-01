<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'companies';
    protected $appends = [
        'image_path',
    ];

    public $timestamps = true;



    protected $fillable = [
       'name',
       'featureImage',
       'city',
       'country',
       'user_id',
       'image',
       'phone',
       'password',
       'address',
       'email',
       'city_id',
       'is_active'
    ];


    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function city(){
        return $this->belongsTo('App\Models\City','city_id');
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
     public function getFeatureImagePathAttribute()
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

