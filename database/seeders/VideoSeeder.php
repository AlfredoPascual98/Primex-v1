<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag_cienciaficcion = Tag::where('tag','ciencia ficción')->first();
        $video=new Video();
        $video->title='Spider-man';
        $video->description='Spider-man';
        $video->route='videos/official/Spider_Man.mp4';
        $video->img='img/portada/spiderman-1.jpg';
        $video->user_id='3';
        $video->save();
        $video->tags()->attach($tag_cienciaficcion);
    }
}
