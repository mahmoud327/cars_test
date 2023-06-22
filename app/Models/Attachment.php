<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{

    protected $table = 'attachments';
    public $timestamps = true;
    protected $fillable = array('usage', 'type', 'path', 'cover_image', 'sm');

    public function attachmentable()
    {
        return $this->morphTo();
    }
    public function getImagePathAttribute()
    {

        if ($this->sm != null && $this->sm != 'file_not_exists') {

            return $this->sm;
        } else {

            return $this->path;
        }
    }
}
