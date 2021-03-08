<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'route',
        'img',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function historie()
    {
        return $this->hasMany(Historie::class, 'video_id', 'id');
    }

    public function score()
    {
        return $this->hasMany(Score::class, 'video_id', 'id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'video_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

   /*  public function videohastag()
    {
        return $this->hasMany(Videohastag::class, 'video_id', 'id');
    } */
}
