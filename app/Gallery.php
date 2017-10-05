<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable =[ 'url', 'is_show', 'post_id' ];
}
