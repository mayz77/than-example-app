<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\StatusNormalScope;

class UserLocation extends Model
{
    use HasFactory, SoftDeletes;

/*    protected static function booted(){
        static::addGlobalScope(new StatusNormalScope);
    }*/

    // public function produce_locations(){
    //     return $this->hasMany(ProduceLocation::class,);
    // }

    public function produce_posts(){
        return $this->belongsToMany(ProducePost::class, 'produce_locations', 'user_location_id', 'produce_post_id');
    }

    // user_locations
    //     id
    //     name
    // produce_posts
    //     id
    //     name
    // produce_locations
    //     user_location_id
    //     produce_post_id
}
