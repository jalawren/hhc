<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostTableSeeder extends Seeder
{

    protected $post;

    /**
     * Construct the class with the Post model
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     */
    public function run()
    {

        $this->post->truncate();
        
        $records = [
//            0 => ['slug' => 'tuesday-heath-tips', 'title' => 'tuesday heath tips', 'category_id' => 1, 'user_id' => 1, 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in posuere justo. Sed nisi tortor, accumsan in sem vitae, sagittis euismod quam. Praesent aliquet leo velit, nec malesuada nibh aliquam a. Nullam sed molestie purus, sit amet pellentesque ex. Quisque sagittis, felis vel mollis efficitur, ante magna ullamcorper risus, vitae consectetur dui odio in velit. Quisque pulvinar quis libero id varius. Sed ut mi lacinia, eleifend turpis eu, lacinia mauris. Integer aliquet, neque ac condimentum faucibus, orci nisi fermentum arcu, eu lobortis eros tellus malesuada lorem.'],
//            1 => ['slug' => 'wednesday-heath-tips', 'title' => 'wednesday heath tips', 'category_id' => 2,  'user_id' => 1, 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in posuere justo. Sed nisi tortor, accumsan in sem vitae, sagittis euismod quam. Praesent aliquet leo velit, nec malesuada nibh aliquam a. Nullam sed molestie purus, sit amet pellentesque ex. Quisque sagittis, felis vel mollis efficitur, ante magna ullamcorper risus, vitae consectetur dui odio in velit. Quisque pulvinar quis libero id varius. Sed ut mi lacinia, eleifend turpis eu, lacinia mauris. Integer aliquet, neque ac condimentum faucibus, orci nisi fermentum arcu, eu lobortis eros tellus malesuada lorem.'],
//            2 => ['slug' => 'thursday-heath-tips', 'title' => 'thursday heath tips', 'category_id' => 1,  'user_id' => 1, 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in posuere justo. Sed nisi tortor, accumsan in sem vitae, sagittis euismod quam. Praesent aliquet leo velit, nec malesuada nibh aliquam a. Nullam sed molestie purus, sit amet pellentesque ex. Quisque sagittis, felis vel mollis efficitur, ante magna ullamcorper risus, vitae consectetur dui odio in velit. Quisque pulvinar quis libero id varius. Sed ut mi lacinia, eleifend turpis eu, lacinia mauris. Integer aliquet, neque ac condimentum faucibus, orci nisi fermentum arcu, eu lobortis eros tellus malesuada lorem.'],
//            3 => ['slug' => 'friday-heath-tips', 'title' => 'friday heath tips', 'category_id' => 3,  'user_id' => 1, 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in posuere justo. Sed nisi tortor, accumsan in sem vitae, sagittis euismod quam. Praesent aliquet leo velit, nec malesuada nibh aliquam a. Nullam sed molestie purus, sit amet pellentesque ex. Quisque sagittis, felis vel mollis efficitur, ante magna ullamcorper risus, vitae consectetur dui odio in velit. Quisque pulvinar quis libero id varius. Sed ut mi lacinia, eleifend turpis eu, lacinia mauris. Integer aliquet, neque ac condimentum faucibus, orci nisi fermentum arcu, eu lobortis eros tellus malesuada lorem.'],
            0 => ['slug' => 'tuesday-heath-tips', 'title' => 'tuesday heath tips', 'user_id' => 1, 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in posuere justo. Sed nisi tortor, accumsan in sem vitae, sagittis euismod quam. Praesent aliquet leo velit, nec malesuada nibh aliquam a. Nullam sed molestie purus, sit amet pellentesque ex. Quisque sagittis, felis vel mollis efficitur, ante magna ullamcorper risus, vitae consectetur dui odio in velit. Quisque pulvinar quis libero id varius. Sed ut mi lacinia, eleifend turpis eu, lacinia mauris. Integer aliquet, neque ac condimentum faucibus, orci nisi fermentum arcu, eu lobortis eros tellus malesuada lorem.'],
            1 => ['slug' => 'wednesday-heath-tips', 'title' => 'wednesday heath tips', 'user_id' => 1, 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in posuere justo. Sed nisi tortor, accumsan in sem vitae, sagittis euismod quam. Praesent aliquet leo velit, nec malesuada nibh aliquam a. Nullam sed molestie purus, sit amet pellentesque ex. Quisque sagittis, felis vel mollis efficitur, ante magna ullamcorper risus, vitae consectetur dui odio in velit. Quisque pulvinar quis libero id varius. Sed ut mi lacinia, eleifend turpis eu, lacinia mauris. Integer aliquet, neque ac condimentum faucibus, orci nisi fermentum arcu, eu lobortis eros tellus malesuada lorem.'],
            2 => ['slug' => 'thursday-heath-tips', 'title' => 'thursday heath tips', 'user_id' => 1, 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in posuere justo. Sed nisi tortor, accumsan in sem vitae, sagittis euismod quam. Praesent aliquet leo velit, nec malesuada nibh aliquam a. Nullam sed molestie purus, sit amet pellentesque ex. Quisque sagittis, felis vel mollis efficitur, ante magna ullamcorper risus, vitae consectetur dui odio in velit. Quisque pulvinar quis libero id varius. Sed ut mi lacinia, eleifend turpis eu, lacinia mauris. Integer aliquet, neque ac condimentum faucibus, orci nisi fermentum arcu, eu lobortis eros tellus malesuada lorem.'],
            3 => ['slug' => 'friday-heath-tips', 'title' => 'friday heath tips', 'user_id' => 1, 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in posuere justo. Sed nisi tortor, accumsan in sem vitae, sagittis euismod quam. Praesent aliquet leo velit, nec malesuada nibh aliquam a. Nullam sed molestie purus, sit amet pellentesque ex. Quisque sagittis, felis vel mollis efficitur, ante magna ullamcorper risus, vitae consectetur dui odio in velit. Quisque pulvinar quis libero id varius. Sed ut mi lacinia, eleifend turpis eu, lacinia mauris. Integer aliquet, neque ac condimentum faucibus, orci nisi fermentum arcu, eu lobortis eros tellus malesuada lorem.'],
//            4 => ['slug' => 'saturday-heath-tips', 'title' => 'saturday heath tips', 'category_id' => 1,  'user_id' => 1, 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in posuere justo. Sed nisi tortor, accumsan in sem vitae, sagittis euismod quam. Praesent aliquet leo velit, nec malesuada nibh aliquam a. Nullam sed molestie purus, sit amet pellentesque ex. Quisque sagittis, felis vel mollis efficitur, ante magna ullamcorper risus, vitae consectetur dui odio in velit. Quisque pulvinar quis libero id varius. Sed ut mi lacinia, eleifend turpis eu, lacinia mauris. Integer aliquet, neque ac condimentum faucibus, orci nisi fermentum arcu, eu lobortis eros tellus malesuada lorem.'],
//            5 => ['slug' => 'sunday-heath-tips', 'title' => 'sunday heath tips', 'category_id' => 4,  'user_id' => 1, 'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in posuere justo. Sed nisi tortor, accumsan in sem vitae, sagittis euismod quam. Praesent aliquet leo velit, nec malesuada nibh aliquam a. Nullam sed molestie purus, sit amet pellentesque ex. Quisque sagittis, felis vel mollis efficitur, ante magna ullamcorper risus, vitae consectetur dui odio in velit. Quisque pulvinar quis libero id varius. Sed ut mi lacinia, eleifend turpis eu, lacinia mauris. Integer aliquet, neque ac condimentum faucibus, orci nisi fermentum arcu, eu lobortis eros tellus malesuada lorem.']
        ];


        /**
         * Create the database entries for the array of posts
         *
         */
        foreach($records as $record)
        {
            $this->post->create($record);
        }
           
    }
}
