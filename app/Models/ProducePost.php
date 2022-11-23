<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Scopes\StatusNormalScope;
use App\Helpers\Datehelper;
use App\Helpers\Statushelper;

class ProducePost extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "produce_posts";
    protected $primaryKey = "id";

    protected static function booted(){
        static::addGlobalScope(new StatusNormalScope);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

     public function user_locations(){
         return $this->belongsToMany(UserLocation::class);
     }

    public function getIsStatusAttribute(){
        if($this->status){
            return Statushelper::th($this->status);
        }else{
            return $this->status;
        }
    }

    public function getCreatedWhenAttribute(){
        if($this->created_at){
            return Datehelper::format_createwhen($this->created_at, "full", "full");
        }
        return "";
    }

    public function getUpdatedWhenAttribute(){
        if($this->updated_at){
            return Datehelper::format_createwhen($this->updated_at, "full", "full");
        }
        return "";
    }

    public function getUserInfoAttribute(){
        if($this->user_id){
            return $this->user->mini_info2;
        }
        return "";
    }
}
