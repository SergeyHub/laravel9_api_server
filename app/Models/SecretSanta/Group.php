<?php
namespace App\Models\SecretSanta;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\SecretSanta\Stuff', 'stuff_groups', 'group_id',
                                                'stuff_id')->withTimestamps();
    }

}
