<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ProduceLocation extends Model
{
    use HasFactory,SoftDeletes;

    public function produce_posts(){
        return $this->hasMany(ProducePost::class);
    }
}
