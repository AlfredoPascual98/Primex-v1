<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;


class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag=new Tag();
        $tag->tag="acción";
        $tag->save();
        $tag=new Tag();
        $tag->tag="ciencia ficción";
        $tag->save();
        $tag=new Tag();
        $tag->tag="comedia";
        $tag->save();
    }
}
