<?php

namespace ACADA;

use Illuminate\Database\Eloquent\Model;
use User;

class Video extends Model
{
    protected $fillable = [
        'link', 'category', 'link_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'user_id',
    ];

    public function users()
    {
      return $this->belongsTo(User::class);
    }
}
