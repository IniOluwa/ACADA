<?php

namespace ACADA;

use Illuminate\Database\Eloquent\Model;
use User;

class YoutubeEmbed extends Model
{
    protected $fillable = [
        'youtubeEmbedCode', 'youtubeEmbedCodeBy',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'user_id',
    ];

    //
    public function users()
    {
      return $this->belongsTo(User::class);
    }
}
