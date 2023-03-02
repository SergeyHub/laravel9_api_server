<?php
namespace App\Models\SecretSanta;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $guarded = [];

    public function profile()
    {
        return $this->belongsTo('App\Models\SecretSanta\Profile');
    }
}
