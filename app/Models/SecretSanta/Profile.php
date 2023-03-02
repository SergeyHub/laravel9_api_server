<?php
namespace App\Models\SecretSanta;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\Models\SecretSanta\Stuff');
    }

    public function santa()
    {
        return $this->hasMany('App\Models\SecretSanta\Stuff', 'id', 'santa_id');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\SecretSanta\Wishlist');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\SecretSanta\Group');
    }

}
