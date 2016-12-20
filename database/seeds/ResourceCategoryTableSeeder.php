<?php

use App\ResourceCategory;
use Illuminate\Database\Seeder;

class ResourceCategoryTableSeeder extends Seeder
{
    protected $category;

    /**
     * Construct the class with the ResourceCategory model
     *
     * @param ResourceCategory $category
     */
    public function __construct(ResourceCategory $category)
    {
        $this->category = $category;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->category->truncate();

        $records = [

            0 => ['name' => 'Websites', 'description' => 'Websites for healthy habits and nutrition'],
            1 => ['name' => 'Books', 'description' => 'Books on healthy living'],
            2 => ['name' => 'Podcasts', 'description' => 'Podcasts on healthy living']
        ];

        /**
         * Create the DB entries for the array of categories
         *
         */
        foreach($records as $record)
        {
            $this->category->create($record);
        }
    }
}
