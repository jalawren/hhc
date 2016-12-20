<?php

use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    protected $tag;

    /**
     * Construct the class with the Post model
     *
     * @param Resource $resource
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->tag->truncate();

        $records = [
            0 => ['title' => 'Health'],
            1 => ['title' => 'Happiness'],
            2 => ['title' => 'Habits'],
            3 => ['title' => 'Stress Reduction'],
 ];


        /**
         * Create the database entries for the array of posts
         *
         */
        foreach($records as $record)
        {
            $this->tag->create($record);

        }

        for($i=1; $i < 5; $i++) {

            $post = Post::find($i);

            $post->tags()->attach(1);
            $post->tags()->attach(2);
            $post->tags()->attach(3);
            $post->tags()->attach(4);
        }
    }
}
