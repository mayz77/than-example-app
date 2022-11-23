<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;
use App\Scopes\PublishedScope;
use App\Scopes\StatusNormalScope;
use App\Models\User;
use App\Models\UserCatepost;
use App\Models\Post;
use App\Models\UserLocation;
use App\Models\ProduceLocation;
use App\Models\CommentPost;
use App\Models\FavoritePost;
use App\Models\LogProduceLocation;
use App\Models\Notification;
use App\Models\Role;
use App\Models\Channel;
use App\Models\UserConsent;
use Validator;
use Carbon\Carbon;
use Session;

class UserController extends Controller
{
    protected $field_append;
    protected $field_makeHidden;

    public function __construct () {
        $this->field_append = ['strtypepostid','imageThumbPath','published_when','published_status','like_total','comment_total','og_imagepath'];
        $this->field_makeHidden = [
            'user_id',
            'type_post_id',
            'category_post_id',
            'subjrelated_post_id',
            'zone_id',
            'strtypepostid',
            'category_post',
            'subjrelated_post',
            'zone',
            'images',
            'imageThumbPath',
            'likes',
            'comments',
            'og_image',
            'published',
            'published_at',
            'created_at','updated_at','deleted_at'
        ];
    }

    public function get_location(Request $request, $user_location_id=1){
        // mock user id
        $user_id = 1;

        // $user_id = $request->user()->id;
        $user_location = UserLocation::select(
            'id','name_th','name_en','lat','long','province','district','sub_district')
            ->with('produce_posts')
            ->where('user_id',$user_id)
            ->findOrFail($user_location_id);

        return response()->json($user_location);
    }
}
